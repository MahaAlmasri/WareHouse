<?php 

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
    <input type="text" id="password" name="password" placeholder="your password.." Required><br>

    <input type="submit" value="Submit" name="submit"><br><br>

  </form>
  <a href='newUser.php'> New Customer? join free now </a></center> 
</body>
</html>

<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{  

$servername = "localhost";
$username = "maha";
$password = "317418";
$dbname = "warehousedb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
  
    $username = $_POST['name'];
    $password = $_POST['password']; 

    $stmt = "select * from users where (userName='$username' or email='$username') and password='$password' ";
    $result = $conn->query($stmt);
    if ($result->num_rows > 0) {
      echo "login succseed";
    }
    else {
        echo "invalid username or password";
    }
    $conn->close();
}
 

}  
?>