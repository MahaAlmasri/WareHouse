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
  <h4> Create a New Account </h4>
<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>"> 
<div>Already a Member? 
<a href='login.php'>Sign in</a></div>
    <label for="name"> Name</label><br>
    <input type="text" id="name" name="name" placeholder="Your name.." Required><br>
    <label for="password"> Password</label><br>
    <input type="text" id="password" name="password" placeholder="your password.." Required><br>
    <label for="password"> Confirm your password:</label><br>
    <input type="text" id="password2" name="password2" placeholder="your password again.." Required><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="Your email.." Required><br>
    
    <input type="submit" value="Create Your Account" name="submit">

  </form>
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
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $username = $_POST['name'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $password2 = $_POST['password2']; 

     
    if($password!=$password2) 
   {  
    $error .= "<p>password doesn't match. </p>"; 
   }  

   if (isset($error))  
  {  
   // error afdrukken 
   echo $error . "<br />";  
   }
  else
  {

    $stmt = $conn->prepare("insert into users (username, password, email, usertype) values (:username, :password, :email , 'user')");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', password_hash($password,PASSWORD_DEFAULT));
    $stmt->bindParam(':email', $email);


    if ($stmt -> execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn=null;
}
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


  }
      
?>