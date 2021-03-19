<?php

if (isset($_GET["username"], $_GET["password"]))
{
    if (file_exists("backend/services/DatabaseWorkerFactory.php")) include_once("backend/services/DatabaseWorkerFactory.php");

    if (file_exists("backend/interfaces/IDatabaseConnection.php")) include_once("backend/interfaces/IDatabaseConnection.php");
    if (file_exists("backend/database/MySqlDatabaseConnection.php")) include_once("backend/database/MySqlDatabaseConnection.php");

    if (file_exists("backend/interfaces/IDatabaseWorker.php")) include_once("backend/interfaces/IDatabaseWorker.php");
    if (file_exists("backend/services/DatabaseWorker.php")) include_once("backend/services/DatabaseWorker.php");

    
    $username = $_GET["username"];
    $password = $_GET["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    try
    {
        $dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
        $result = $dbWorker->Create("users", ["username" => $username, "password" => $hash]);
        if ($result) echo "User successfully added";
        else echo "Error when adding user";
    }
    catch (Exception $e)
    {
        echo "Error was when creating user";
    }
   
    
}

?>