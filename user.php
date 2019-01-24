<?php

namespace WareHouse
{
 
    require_once('config.php');

class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $userType;

    public function setId($_id)
    {
        $this->id=$_id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setUsername($_username)
    {
        $this->username=$_username;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($_password)
    {
        $this->password=$_password;
    }
    public function getPassword()
    {
        return $this->password ;
    }

    public function setEmail($_email)
    {
        $this->email=$_email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setUsertype($_usertype)
    {
        $this->userType=$_usertype;
    }
    public function getUsertype()
    {
        return $this->userType;
    }

    public function __construct( $_username, $_password, $_email, $_usertype)
    {

        $this->username=$_username;
        $this->password=$_password;
        $this->email=$_email;
        $this->userType=$_usertype;
    }

    public function insertUser()
    {
       //password hashing
       $pass=  password_hash( $this->password,PASSWORD_DEFAULT);
        // Create connection
        $conn= new Connection();
        
        $stmt = $conn->connection->prepare("insert into users (username, password, email, usertype) values (:username, :password, :email , :usertype)");
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':email',  $this->email);
        $stmt->bindParam(':usertype', $this->userType);
     
        return $stmt -> execute() ;
    
    }
}



}
?>
