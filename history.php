<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index');
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Balance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/inventory.css">
</head>

<body>
    <div class="container text-center">
        <h1>History</h1>

        <?php

        include_once("backend/services/DatabaseWorkerFactory.php");

        include_once("backend/interfaces/IDatabaseConnection.php");
        include_once("backend/database/MySqlDatabaseConnection.php");

        include_once("backend/interfaces/IDatabaseWorker.php");
        include_once("backend/services/DatabaseWorker.php");

        $dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
        $transactions = $dbWorker->ReadAll("transactions");

        echo "<table>";
        echo "<thead>";

        echo "<tr>";
        echo "<th>Date</th>";
        echo "<th>Type</th>";
        echo "<th>Price</th>";
        echo "<th>Details</th>";
        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";

        $totalBalance  = 0;

        foreach ($transactions as $transaction) {
            echo "<tr>";
            echo "<td>" . date("d-m-Y H:i", strtotime($transaction->creation_date)) . "</td>"; 
            echo "<td>" . $transaction->type . "</td>"; 
            echo "<td>" . $transaction->price . "</td>"; 
            echo "<td><a href=\"orderdetails?id=$transaction->id\">Details<a></td>"; 

            $totalBalance = ($transaction->type === "buy") ? $totalBalance - $transaction->price : $totalBalance += $transaction->price; 
        }
        echo "</tbody>";
        echo "</table>";

        echo "<h1 style=\"font-size: 30px; font-style:italic\">Total balance: " . $totalBalance . "</h1>";

        ?>
    </div>


</body>

</html>