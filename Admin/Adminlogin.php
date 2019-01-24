<?php 
namespace WareHouse
{
    require "../vendor/autoload.php";

session_start();
require_once('../config.php');
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
<link rel='stylesheet' href='../css/style.css'/>	

<title>Online WareHouse</title>

</head>
<body>
<center>  <h1> Login Form </h1>
<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>"> 


    <label for="name"> UserName </label><br>
    <input type="text" id="name" name="name" placeholder="Your username of email.." Required><br>
    <label for="password"> Password</label><br>
    <input type="password" id="password" name="password" placeholder="your password.." Required><br>
    
    <input type="submit" value="Submit" name="submit"><br><br>

  </form>
  <a href='newAdmin.php'>Add New Admin? </a></center> 
</body>
</html>

<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{  
    $username = $_POST['name'];
    $password = $_POST['password']; 
    $conn = new Connection();
    $stmt = $conn->connection->prepare("select password from users where ((username=:username or email=:username) and (usertype='admin'))");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
if ($stmt->rowCount()>0){
    if ($data = $stmt->fetch(\PDO::FETCH_OBJ)) {
    if (password_verify($password ,  $data->password))
    header('location: newProduct.php');
    else 
        echo "invalid username or password";}
    }
    $conn=null;
}
} 
?>