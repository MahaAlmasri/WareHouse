<?php
namespace WareHouse
{
require "vendor/autoload.php";
require_once('config.php');
class Product
{
    private $productId;
    private $productName;
    private $price;
    private $description;
    private $amount;


    public function __construct( $_productName="", $_price=0, $_description="", $_amount=0)
    {

        $this->productName=$_productName;
        $this->price=$_price;
        $this->description=$_description;
        $this->amount=$_amount;
    }

    public function insertProduct()
    {
       
// Create connection
        $conn = new Connection();
        $stmt = $conn->connection->prepare("insert into products (name, price, description, amount) values (:name, :price, :description , :amount)");
        $stmt->bindParam(':name', $this->productName);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description );
        $stmt->bindParam(':amount', $this->amount);
       
        return $stmt -> execute() ;
    
    }

    public function selectAll()
    {
        $conn = new Connection();
        $stmt = $conn->connection->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt;
           
    }
}



}
?>
