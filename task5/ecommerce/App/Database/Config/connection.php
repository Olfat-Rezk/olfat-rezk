<?php
namespace App\Database\Config;

class Connection{
   private $serverName ="localhost";
   private $userName = "root";
   private $password = '';
   private $database = 'ecommerce';
   private $port = 3306;
   public $conn;
    public function __construct(){
       $this->conn = new \mysqli($this->serverName ,$this->userName ,$this->password,$this->database,$this->port);
        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        //   }
        //   echo "Connected successfully";
    }

public function __destruct()
{
    $this->conn->close();
}

 }
//  new Connection;