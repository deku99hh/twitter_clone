<?php

class Product{

    private $table = "products";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function getAllProducts()
    {

        $AllProducts;

        try {
            $query = "SELECT * FROM " . $this->table;

            $stmt = $this->pdo->prepare($query);

            $stmt->execute();
            
            $AllProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $stmt = null;

        }  catch ( PDOException $e ) {
            die( "connection faild " . $e->getMessage() );
        }

        return $AllProducts;
    }


}


// CREATE TABLE products(
//     id INT(11) NOT NULL AUTO_INCREMENT,
//     product_name varchar(30) NOT NULL UNIQUE,
//     PRIMARY KEY(id)
// );
// INSERT INTO products (product_name) VALUES('a');
// INSERT INTO products (product_name) VALUES('b');
// INSERT INTO products (product_name) VALUES('c');
