<?php

class ProductController extends AbstractController {
    private ProductManager $pm;

    public function __construct(ProductManager $pm)
    {
        $this->pm = new ProductManager($dbName, $port, $host, $username, $password);
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
            $category =
        }
    }
}

?>