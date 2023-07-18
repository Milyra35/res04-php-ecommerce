<?php

class ProductManager extends AbstractManager {

    // To get all the categories in an array
    public function getAllProducts() : array
    {
        $query=$this->db-prepare("SELECT * FROM products");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // Create a product and send it in the database
    public function createProduct(Product $product) : Product
    {
        $query=$this->db->prepare("INSERT INTO products (product_name, picture, description, price, quantity)
                  VALUES (:name, :picture, :description, :price, :quantity)");
        $parameters = [
            'name' => $product->getName(),
            'picture' => $product->getPicture(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'quantity' => $product->getQuantity()
        ];

        $query->execute($parameters);
        $id = $query->fetch(PDO::FETCH_ASSOC);
        $product->setId($this->db->lastInsertId());

        return $product;
    }

    public function editProduct(Product $product) : void
    {
        $query=$this->db->prepare("UPDATE products SET product_name = :name, pictures = :picture, description = :description, price = :price, quantity = :quantity");
        $parameters = [
            'name' => $product->getName(),
            'picture' => $product->getPicture(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'quantity' => $product->getQuantity()
        ];
        $query->execute($parameters);
    }

    public function
}

?>