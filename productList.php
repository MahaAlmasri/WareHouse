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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
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

  /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
  .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
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