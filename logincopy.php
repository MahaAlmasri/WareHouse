<?php 
namespace WareHouse
{
require ('config.php');
session_start();
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
<link rel='stylesheet' href='./css/style.css'/>	

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
  <a href='newUser.php'> New Customer? join free now </a></center> 
</body>
</html>

<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{  
    $username = $_POST['name'];
    $password = $_POST['password']; 
    echo $password;
    $connection = new Connection();
    $conn=$connection->createConnection();

    $stmt = $conn->prepare("select password from users where (userName=:username or email=:username)");
$stmt->bindParam(':username', $username);
$stmt->execute();

    if ($data = $stmt->fetch()) 
    if ( password_verify ( $password ,  $data['password']  ) ==true)
      echo "login succseed";
    else 
        echo "invalid username or password";
echo   $data['password'];
    $conn=null;
}
} 
?>