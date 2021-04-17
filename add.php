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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/form.css">
  <link rel="stylesheet" href="styles/inventory.css"> <!-- table style -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="scripts/navigation-bar.js"></script>

  <script src="ajax/add-products.js"></script>
</head>

<body>

  <h1 class="text-center">Add product</h2>

    <div class="container">
      <form action="" method="post">

        <div class="row">
          <div class="col-25">
            <label for="name">Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="name" name="name" placeholder="Name">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="color">Color</label>
          </div>
          <div class="col-75">
            <input type="text" id="color" name="color" placeholder="Color">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="quanitty">Quantity</label>
          </div>
          <div class="col-75">
            <input type="number" id="quantity" name="quantity" placeholder="Quantity" min="1">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <span class="span-link">
              <p onclick="addProductToBasket()">Add product</p>
            </span>
          </div>
        </div>

        <div class="row">
          <span class="span-link">
            <p onclick="showProductBasket()" id="show-basket-button">Show basket</p>
          </span>
          <div id="basket" class="basket-info" style="display: none; margin: 20px 20px; text-align:center;">
            <?php
            if (!empty($_SESSION["cart_items"])) {

              printBasket(false);

            } else {

              printBasket(true);

            }

            function printBasket(bool $basketIsEmpty)
            {
              if ($basketIsEmpty)
              {
                echo "<p style=\"text-align:center; font-size:25px;\" id=\"empty-basket-message\">" . "Product cart is empty!" . "</p>";
                echo  "<div class=\"table-wrapper\" id=\"cart-table-wrapper\" style=\"display:none;\">";
              }
              else
              {
                echo "<p style=\"text-align:center; font-size:25px; display: none;\" id=\"empty-basket-message\">" . "Product cart is empty!" . "</p>";
                echo  "<div class=\"table-wrapper\" id=\"cart-table-wrapper\">";
              }

              echo  "<table class=\"text-center center\" id=\"cart-table\">
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
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>";

            
              $cart = isset($_SESSION["cart_items"]) ? $_SESSION["cart_items"] : "";

              if (!empty($cart))
              {
                foreach ($cart as $cartItem) {

                  echo
                  "<tr>
                    <td>"
                    . $cartItem["name"] .
                    "</td>
                    <td>"
                    . $cartItem["color"] .
                    "</td>
                    <td>"
                    . $cartItem["quantity"] .
                    "</td>
                    <td>
                      <a>Edit</a>
                      <a>Delete</a> 
                    </td>
                  </tr>";
                }  
              }

              echo "</tbody></table>";
              echo "<a href=\"backend/api/products/basket/clear.php\" id=\"clear-basket-button\">Clear basket</a>";
            }
            ?>


          </div>

        </div>

        <div class="row">
          <div class="col-25">
            <label for="country">Total Price</label>
          </div>
          <div class="col-75">
            <input type="number" id="totalPrice" name="color" placeholder="Total Price" required min="0">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="subject">Details</label>
          </div>
          <div class="col-75">
            <textarea id="deatils" name="details" placeholder="Write some details.." style="height:200px"></textarea>
          </div>
        </div>

        <div class="row">
          <input type="submit" value="Buy" id="buy-button">
        </div>

      </form>
    </div>

</body>

</html>