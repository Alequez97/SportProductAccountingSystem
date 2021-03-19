<?php
    session_start();
    if (!isset($_SESSION['loggedin']))
    {
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
</head>

<body>
    <div class="container text-center">
        <h1>Balance</h1>
    </div>
</body>

</html>