<?php 
namespace WareHouse
{
 require "vendor/autoload.php";
 require_once('product.php');
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
<style>
table, th, td {
    border: 1px solid black;
}
.productDiv
{
  border: 1px solid rgb(145, 2, 2);
  border-radius: 4px;
  text-align: center;
width:150px;
}
</style>

</head>
<body>
<center>  <h1> Product List </h1>
</body>
</html>

<?php
$pro=new Product();
 $products= $pro->selectAll();
    // output data of each row
    foreach( $products as $product )
    {
             
       echo "<div class='productDiv'> <h3>" . $product["productName"] . "</h3> <br> <h4>". $product["price"]. "<br>". $product["description"]. "</h4></div>" ;
    }
    



}
?>