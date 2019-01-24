<?php
namespace WareHouse
{
require "vendor/autoload.php";
require_once('config.php');
class Product
{
    private $productId;
    private $productNmae;
    private $price;
    private $description;
    private $amount;

    public function setproductId($_productId)
    {
        $this->productId=$_productId;
    }
    public function getproductId()
    {
        return $this->productId;
    }

    public function setproductNmae($_productNmae)
    {
        $this->productNmae=$_productNmae;
    }
    public function getproductName()
    {
        return $this->productName;
    }

    public function setprice($_price)
    {
        $this->price=$_price;
    }
    public function getprice()
    {
        return $this->price ;
    }

    public function setdescription($_description)
    {
        $this->description=$_description;
    }
    public function getdescription()
    {
        return $this->description;
    }
    
       public function setAmount($_amount)
    {
        $this->amount=$_amount;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function __construct( $_productNmae="", $_price=0, $_description="", $_amount=0)
    {

        $this->productNmae=$_productNmae;
        $this->price=$_price;
        $this->description=$_description;
        $this->amount=$_amount;
    }

    public function insertProduct()
    {
       
// Create connection
        $conn = new Connection();
        $stmt = $conn->connection->prepare("insert into products (name, price, description, amount) values (:productName, :price, :description , :amount)");
        $stmt->bindParam(':productName', $this->getproductName());
        $stmt->bindParam(':price', $this->getprice());
        $stmt->bindParam(':description', $this->getdescription());
        $stmt->bindParam(':amount', $this->getAmount());
       
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
