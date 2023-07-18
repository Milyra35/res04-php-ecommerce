<?php

class ProductController extends AbstractController {
    private ProductManager $pm;
    private CategoryManager $cm;

    public function __construct()
    {
        $this->pm = new ProductManager();
        $this->cm = new CategoryManager();
    }

    // To show all the products on one page
    public function indexOfProducts()
    {
        $products = $this->pm->getAllProducts();
        $this->render('products/index.phtml', $products);
    }

    // To render the
    public function createProduct()
    {
        $this->render('products/index.phtml', []);
        if(isset($_POST['submit-new-product']))
        {
            $name = $_POST['name'];
            $picture = $_POST['picture'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
        }
    }

    public function productsByCategory()
    {
        $this->cm->getCategoryById(); //Put the id in parameter
        $products = $this->pm->getProductByCategory(); //Put the name of the category in parameter
        $this->render('categories/category.phtml', $products);
    }
}

?>