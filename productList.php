<?php 
namespace WareHouse
{
require_once ('config.php');
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
</style>

</head>
<body>
<center>  <h1> Product List </h1>
</body>
</html>

<?php

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    // output data of each row
    while($row = $stmt->fetch()) {
             
        echo "<h4>".$row["productName"]."</h4><br><h6>".$row["price"]."</h6><br><h5>".$row["description"]."</h5></br>";
    }
    echo "</table>";
    $conn=null;


}
?>