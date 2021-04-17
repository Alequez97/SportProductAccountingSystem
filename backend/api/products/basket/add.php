<?php
    // header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");

    // include database
    include_once("../../../services/DatabaseWorkerFactory.php");
    include_once("../../../interfaces/IDatabaseConnection.php");
    include_once("../../../database/MySqlDatabaseConnection.php");
    include_once("../../../interfaces/IDatabaseWorker.php");
    include_once("../../../services/DatabaseWorker.php");

    session_start();
  
    // instantiate database and product object
    $dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
    
    $name  = !empty($_GET['name']) ? $_GET['name'] : die();
    $color  = !empty($_GET['color']) ? $_GET['color'] : die();
    $quantity  = !empty($_GET['quantity']) ? $_GET['quantity'] : die();

    $products = array("name" => $name, "color" => $color, "quantity" => $quantity);

    if (!isset($_SESSION["cart_items"]))
    {
        $_SESSION["cart_items"][] = $products;    
    }
    else 
    {
        array_push($_SESSION["cart_items"], $products);
    }
    
    if (!empty($name) && !empty($color) && !empty($quantity))
    {
        http_response_code(200);
        echo json_encode($products);
    }
    else
    {
        http_response_code(404);
    }
?>