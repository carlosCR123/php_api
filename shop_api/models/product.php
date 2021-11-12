<?php

class Product {
    
    private $table = 'product';
    private $connection; //Conexion a la base de datos
    public $id;
    public $name;
    public $price;
    public $category;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function readAll()
    {
        $query = 'SELECT * FROM ' . $this->table;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function create() 
    {
        $query = "INSERT INTO ". $this->table . " SET name = :name, price = :price, category = :category";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':category', $this->category);
        
        return $stmt->execute();
    }

    public function update() 
    {
        $query = "UPDATE ". $this->table . " SET name = :name, price = :price, category = :category WHERE id = :id";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name',       $this->name);
        $stmt->bindParam(':price',      $this->price);
        $stmt->bindParam(':category',   $this->category);
        $stmt->bindParam(':id',         $this->id);
        
        return $stmt->execute();
    }

    public function read() 
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id       = $data["id"];
        $this->name     = $data["name"];
        $this->price    = $data["price"];
        $this->category = $data["category"];

    }

    public function delete() {
      
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
  }

}