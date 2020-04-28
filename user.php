<?php

include "Crud.php";
include "authenticator.php";
include_once 'DBConnector.php';
class User implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $username;
    private $password;
  


    function __construct($first_name,$last_name,$city_name,$username,$password)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->city_name=$city_name;
        $this->username=$username;
        $this->password=$password;
       
    }

    public static function create(){
        $instance= new self();
        return $instance;
    }

    //username setter
    public function setUsername($username)
    {
        return $this->username=$username;
    }
    //username getter
    public function getUsername(){
        return $this->username;
    }

    
    //password setter
    public function setPassword($password)
    {
        return $this->password=$password;
    }
    //password getter
    public function getPassword(){
        return $this->password;
    }


    public function setUserId($user_id){
        $this->user_id=$user_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function save($conn)
    {
        
        $fn=$this->first_name;
        $ln=$this->last_name;
        $city=$this->city_name;
        $uname=$this->username;
        $this->hashPassword();
        $pass=$this->password;

        $query="INSERT INTO user(first_name,last_name,user_city,username,password) VALUES ('$fn','$ln','$city','$uname','$pass')";
        $res=mysqli_query($conn,$query)or die("Error inserting values" . mysqli_error("Error Inserting"));
        return $res;
    }
    
    public function readALl()
    {
       return null;   
    }

    public function readUnique()
    {
       return null; 
    }

    public function hashPassword(){
        //in-built function to hash password
        $this->password=password_hash($this->password,PASSWORD_DEFAULT);
    }
    
    public function isPasswordCorrect(){
        $con=new DBConnector;
        $found=false;
        $res=mysqli_query($con,"SELECT * FROM user") or die("Error ".mysqli_error("Just an Error"));
        
        while($row=mysqli_fetch_array($res)){
            if (password_verify($this->getPassword(),$row['password'])&&$this->getUsername()==$row['username']) {
                $found=true;
            }
        }
        $con->closeDatabase();
        return $found;
    }

    public function login(){
        if ($this->isPasswordCorrect()) {
            
            header("Location:private_page.php");
        }
    }

    public function createUserSession()
    {
        session_start();
        $_SESSION['username']=$this->getUsername();
    }

    public function logut()
    {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("Location:lab1.php");
    }


    public function search()
    {
        return null;
    }

    public function update()
    {
        return null;
    }

    public function removeOne()
    {
        return null;
    }

    public function removeAll()
    {
        return null;
    }

    public function validate_Form(){
        $fn=$this->first_name;
        $ln=$this->last_name;
        $city=$this->city_name;

        if ($fn=="" || $ln=="" || $city=="") {
            return false;
        }
        return true;
    }

    public function createFormErrorSessions(){

        session_start();
        $_SESSION['form_errors']="All fields are required";
    }

}

?>