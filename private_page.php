<?php
include 'DBConnector.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
function fetchUserApiKey()
{
    $username = $_SESSION['username'];
    $key = "";
    $db = new DBConnector;
    $conn = $db->conn;
    $re = mysqli_query($conn, "SELECT id FROM user WHERE username = '$username'");
    while($row = mysqli_fetch_array($re))
    {
        $id = $row['id'];
    }
    $res = mysqli_query($conn, "SELECT api_key FROM api_keys WHERE user_id = '$id'");
    while($row = mysqli_fetch_array($res))
     {
         $key = $row['api_key'];
     }
     return $key;

}
?>
<html>
    <head>
        <title>PRIVATE PAGE</title>
        <script type="text/javascript" src="validate.js"></script>
        <script type="text/javascript" src="apikey.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    </head>
   
    <body>
       
        <p align="right"><a href="logout.php">Logout</a></p>
        
        <hr>
        <h3>Here we will create an API that will allow Users/Developers to order items from external systems</h3>
        <hr>
        <h4>We now put this feature of allowing users to generate an API key. Click the button to generate an API key</h4>

        <button class="btn btn-primary" id="api-key-btn">Generate API key</button>
        <br><br>

        <!-- This text area will hold the API key -->
        
        <strong>Your API key:</strong>(Note that if your API key is already in use by runing applications,generatig a new key will stop the application from functioning)<br> 
        <textarea name="api_key" id="api_key" cols="100" rows="2" readonly><?php echo fetchUserApiKey();?></textarea>
    
        <h3>Service Description</h3>
        We have a service/API that allows external applications to order food and also pull all order status by using order id. Let's go!!!
        <hr>
    </body>
</html>