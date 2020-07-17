<?php
include_once "DBConnector.php";
if ($_SERVER['REQUEST_METHOD']!=='POST') {
    header('HTTP/1.0 403 Forbidden');
    echo "You are forbidden";
} else {
    //Generate an API key 64 characters long
    $api=new Api;
    $api_key= $api->generateApiKey(64);
    header('Content-type: application/json');
    echo $api->generateResponse($api_key);
}
class Api{
    private $api_key;
    public function __construct()
    {
       
    }
function generateApiKey($str_length){
    $chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    //Get enough random bits for base 64 encoding(an prevent '=' padding)
    //+1 is faster than ceil()
    $bytes=openssl_random_pseudo_bytes(3*$str_length/4+1);
    
    //Convert base 64 to base 62 by mapping + and / to something from the base 62 map
    //use the first 2 random bytes for the new characters
    $repl=unpack('C2',$bytes);

    $first=$chars[$repl[1]%62];
    $second=$chars[$repl[2]%62];
    $this->api_key= strtr(substr(base64_encode($bytes),0,$str_length),'+/',"$first$second");
    return $this->api_key;
}

function saveApiKey(){
    $con= new DBConnector;
    $id='';
    $username='USER';
    $res = mysqli_query($con->conn, "SELECT * id FROM user WHERE username='$username'"  ) or die("Error: ");
    while ($row=mysqli_fetch_array($res) ) {
        $id=$row['id'];
    }
    
    $save=mysqli_query($con->conn,"INSERT INTO api_keys (user_id,api_key) VALUES ('$id','$this->api_key') ");
    return $save;
}

function generateResponse()
{
    if ($this->saveApiKey()) {
        $res=['succes'=>1,'message'=>$this->api_key];
    } else {
        $res=['succes'=>0,'message'=>'Something went wrong. Please regenerate the API key'];
    }
    return json_encode($res);
}

}

?>