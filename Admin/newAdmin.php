<?php 
namespace WareHouse{
require "../vendor/autoload.php";

session_start();
require_once('../classes/user.php')

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
  <h4> Create a New Account </h4>
<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>"> 
<div>Already a Member? 
<a href='Adminlogin.php'>Sign in</a></div>
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
       
    $username = $_POST['name'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $password2 = $_POST['password2']; 
    $error ="";
     
    if($password!=$password2) 
   {  
    $error .= "<p>password doesn't match. </p>"; 
   }  

  if ($error!="")  
  {  
   // error afdrukken 
   echo $error . "<br />";  
   }
  else 
  {
     $user=new User($username, $password, $email, 'admin');
     
      if ($user->insertUser()==true)
        echo "New record created successfully";
    
    }
}


}
  
      
?>