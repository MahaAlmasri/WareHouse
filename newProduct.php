<?php 
namespace WareHouse {
require "vendor/autoload.php";
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
  <h4> Add a New Product </h4>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
    <label for="productname">Product Name</label><br>
    <input type="text" id="name" name="name" placeholder="Product Name.." Required><br>
    <label for="price"> Price</label><br>
    <input type="text" id="price" name="price" placeholder="Price.." Required><br>
    <label for="description"> Description:</label><br>
    <input type="text" id="description" name="description" placeholder="description.." ><br>
    <label for="amount"> Amount:</label><br>
    <input type="text" id="amount" name="amount" placeholder="amount.." ><br>
   
 <input type="submit" value="Submit" />

  </form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $price = $_POST['price']; 
    $description = $_POST['description'];
    $amount = $_POST['amount'];
  
    $last_id=0;
   
    $product=new Product($name, $price, $description, $amount);
    if ($product->insertProduct()===true)
      
        {
            $last_id = $conn->lastInsertId();

     echo "New Product created successfully";
    }
     else 
        echo "Error";
    
    

  
   }

}
?>