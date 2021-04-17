<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // include database
    include_once("../../services/DatabaseWorkerFactory.php");
    include_once("../../interfaces/IDatabaseConnection.php");
    include_once("../../database/MySqlDatabaseConnection.php");
    include_once("../../interfaces/IDatabaseWorker.php");
    include_once("../../services/DatabaseWorker.php");
  
    // instantiate database and product object
    $dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $product = $dbWorker->Read('products', $id);

    if (isset($product))
    {
        $dbWorker->Delete('products', $id);
        http_response_code(200);
        echo json_encode(array("message" => "Product successfully deleted", "id" => $id));
    }
    else
    {
        http_response_code(404);
        echo json_encode(array("message" => "Product with id $id not found"));
    }

    
?>