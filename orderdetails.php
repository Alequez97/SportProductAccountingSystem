<?php

if (empty($_GET["id"])) {
    die("Id not found!");
}
include_once("backend/services/DatabaseWorkerFactory.php");

include_once("backend/interfaces/IDatabaseConnection.php");
include_once("backend/database/MySqlDatabaseConnection.php");

include_once("backend/interfaces/IDatabaseWorker.php");
include_once("backend/services/DatabaseWorker.php");

$dbWorker = DatabaseWorkerFactory::GetMySqlDatabaseWorker("localhost", "root", "", "jurec_sanja");
$transaction = $dbWorker->Read("transactions", $id = $_GET["id"]);

$productsInTransaction = explode(",", $transaction->details);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Order details</title>
</head>

<body>


    <div class="container text-center" style="margin-top: 50px;">

        <h1>Order id=<?php echo $_GET["id"] . " details" ?></h1>

        <p>Type: <?php echo $transaction->type ?>

        <p style="margin: 20px;"><?php echo date("d-m-Y H:i", strtotime($transaction->creation_date)) ?> </p>

        <?php

        for ($i=0; $i < count($productsInTransaction) - 1; $i += 3) { 
            echo "<div  style=\"border: 1px solid lightgray; padding: 20px;\">";
            echo $productsInTransaction[$i] . " | " . $productsInTransaction[$i + 1] . " | " . $productsInTransaction[$i + 2] . "<br>";
            echo "</div>";
        }

        ?>
        <h1 style="font-size: 35px; font-style: italic;">Total price: <?php echo $transaction->price ?></h1>
    </div>

</body>

</html>