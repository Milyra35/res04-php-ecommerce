<?php

class UserController extends AbstractController {

    private $userManager;
    private $orderManager;

    public function __construct()
    {
        $this->userManager = new UserManager("marierichir_ecommerce","3306","", "marierichir", "a616eefc0b8af8e5fb785ae6b42c19f1");
        $this->orderManager = new OrderManager("marierichir_ecommerce","3306","db.3wa.io", "marierichir", "a616eefc0b8af8e5fb785ae6b42c19f1");
    }

    public function index()
    {
        $allUsers = $this->userManager->getAllUsers();
        $allOrders = $this->orderManager->getAllOrders();
        var_dump($allUsers);
        var_dump($allOrders);
        $this->render('index', ["users" => $allUsers, "orders" => $allOrders]);

    }



    public function createUser()
    {
        if(isset($_POST['firstname'], $_POST['lastname'], $_POST['password']))
        {
            $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['password']);
            $this->userManager->insertUser($user);
            $allUsers = $this->userManager->getAllUsers();
            $this->render('create_user', ['user' => $user]);
        }
        else
        {
            $allUsers = $this->userManager->getAllUsers();
            $this->render('create_user', ['users' => $allUsers]);
        }
    }


    public function editUser(){


        if(isset($_POST['firstname'], $_POST['lastname']))
        {
            $user = new User($_SESSION['id'], $_POST['firstname'], $_POST['lastname']);
            $this->userManager->updateUser($id);
            $allUsers = $this->userManager->getAllUsers();
            $this->render('edit_user', ['users' => $allUsers]);
        } else{
            $allUsers = $this->userManager->getAllusers();
            $this->render('index_user', ['users' => $allUsers]);
        }

    }


    public function delete(int $userId)
    {
        $this->userManager->deleteUser($userId);
        $allUsers = $this->userManager->getAllUsers();
        $this->render('delete_user', ['users' => $allUsers]);
    }




    public function read(int $userId)
    {
        $user = $this->userManager->getUserById($userId);

        if ($user !== null) {
            $this->render('read_user', ['user' => $user]);
        } else {
            echo'user non trouvé';
        }
    }

    // public function readAll()
    // {

    // }
}

?>