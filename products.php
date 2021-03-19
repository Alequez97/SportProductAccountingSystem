<?php
    session_start();
    if (!isset($_SESSION['loggedin']))
    {
        header('Location: index');
        exit;
    }

    include_once("backend/services/DatabaseWorkerFactory.php");

    include_once("backend/interfaces/IDatabaseConnection.php");
    include_once("backend/database/MySqlDatabaseConnection.php");

    include_once("backend/interfaces/IDatabaseWorker.php");
    include_once("backend/services/DatabaseWorker.php");    
    
    $dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
    $products = $dbWorker->ReadAll("products");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/inventory.css">
    <link rel="stylesheet" href="styles/navigation-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/navigation-bar.js"></script>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="products" class="active">Products</a>
        <a href="add">Add</a>
        <a href="remove">Remove</a>
        <a href="history">History</a>
        <a href="balance">Balance</a>
        <a href="logout" id="logout">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="showNavigationBar()">
            <span class="fa fa-bars"></span>
        </a>
    </div>

    <?php

        if (empty($products))
        {
            echo "<h2 class=\"text-center\">No products added!</h2>";
        }
        else
        {
            echo "<div class=\"container\">
            <h1 class=\"text-center\">Products</h1>
            <div>
                <div class=\"table-wrapper\">
                    <table class=\"text-center center\">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Color
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach($products as $product)
                {
                    echo "<tr>
                            <td>
                                $product->name
                            </td>
                            <td>
                                $product->color
                            </td>
                            <td>
                                $product->quantity
                            </td>
                            <td>
                                <a href=\"products/details/$product->id/\">Details</a>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>";
                }
        }

    ?>
</body>

</html>