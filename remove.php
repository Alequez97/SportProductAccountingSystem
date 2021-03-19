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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
</head>
<body>

<h1 class="text-center">Remove product</h2>

<div class="container">
  <form action="" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <select id="fname" name="name">
            <option>Resistance Band (Yellow)</option>
            <option>Resistance Band (Red)</option>
            <option>Resistance Band (Green)</option>
            <option>Resistance Band (Purple)</option>
            <option>Resistance Band (Black)</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Quantity</label>
      </div>
      <div class="col-75">
        <input type="text" id="color" name="color" placeholder="Quantity" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="Price" required>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Sell">
    </div>
  </form>
</div>

</body>
</html>