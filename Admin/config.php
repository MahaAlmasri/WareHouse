<?php
namespace WareHouse
{
    require "vendor/autoload.php";

use \PDO;

class Connection{

private $servername ="localhost";
private $username ="maha";
private $password ="317418";
private $dbname ="warehousedb";

public $connection;

 function __construct()
{
    $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

}

function __destruct()
{
    $this->connection=null;
}

}
}
?>