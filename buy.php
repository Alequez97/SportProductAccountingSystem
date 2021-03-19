<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/buy.css">
</head>
<body>

<h1 class="text-center">New product</h2>

<div class="container">
  <form action="" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" placeholder="Name" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Color</label>
      </div>
      <div class="col-75">
        <input type="text" id="color" name="color" placeholder="Color" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Price</label>
      </div>
      <div class="col-75">
         <input type="text" id="price" name="color" placeholder="Price" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Quantity</label>
      </div>
      <div class="col-75">
         <input type="number" id="price" name="quantity" placeholder="Quantity" required min="1">
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
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>