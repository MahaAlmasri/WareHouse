<?php
namespace WareHouse
{

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
    public function getproductNmae()
    {
        return $this->productNmae;
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

    public function __construct( $_productNmae, $_price, $_description, $_amount)
    {

        $this->productNmae=$_productNmae;
        $this->price=$_price;
        $this->description=$_description;
        $this->amount=$_amount;
    }

    public function insertProduct()
    {
       
// Create connection
    $connection = new Connection();
    $conn=$connection->createConnection();

        $stmt = $conn->prepare("insert into products (productName, price, description, amount) values (:productNmae, :price, :description , :amount)");
        $stmt->bindParam(':productNmae', $this->getproductNmae());
        $stmt->bindParam(':price', $this->getprice());
        $stmt->bindParam(':description', $this->getdescription());
        $stmt->bindParam(':amount', $this->getAmount());
    
    
        return $stmt -> execute() ;
    
    }
}



}
?>
