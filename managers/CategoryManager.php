<?php

class CategoryManager extends AbstractManager {

    // To get all categories
    public function getAllCategories() : array
    {
        $query=$this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $array=$query->fetch(PDO::FETCH_ASSOC);

        return $array;
    }

    public function createCategory(Category $category) : Category
    {
        $query=$this->db->prepare("INSERT INTO categories (category_name, product_id, description)
                            VALUES (:name, :product, :description)");
        $parameters=[
            'name' => $category->getName(),
            'product' => $category->getCategory()->getId(),
            'description' => $category->getDescription()
        ];
        $query->execute($parameters);
        $id=$query->fetch(PDO::FETCH_ASSOC);
        $category->setId($this->db->lastInsertId());

        return $category;
    }

    // To get a category by its id
    public function getCategoryById(int $id) : Category
    {

    }
}

?>