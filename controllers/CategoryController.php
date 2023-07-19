<?php

class CategoryController extends AbstractController {
    private CategoryManager $cm;

    public function __construct()
    {
        $this->cm = new CategoryManager();
    }

    public function getAllCategories()
    {
        $categories = $this->cm->getAllCategories();
        $this->render('categories/index.phtml', $categories);
    }
}

?>