<?php

session_start();

$host = "db.3wa.io";
$port = "3306";
$dbName = "marierichir_ecommerce";
$username = "marierichir";
$password = "a616eefc0b8af8e5fb785ae6b42c19f1";

require 'services/autoload.php';

$um = new UserManager($dbName, $port, $host, $username, $password);
$pm = new ProductManager($dbName, $port, $host, $username, $password);
$cm = new CategoryManager($dbName, $port, $host, $username, $password);
$om = new OrderManager($dbName, $port, $host, $username, $password);

$uc = new UserController($um);
$pc = new ProductController($pm);
$cc = new CategoryController($cm);



?>