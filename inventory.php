<!DOCTYPE html>
<html>

<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="styles/inventory.css">
    <link rel="stylesheet" href="styles/navigation-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/navigation-bar.js"></script>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Inventory</a>
        <a href="buy.php">Buy</a>
        <a href="sell.php">Sell</a>
        <a href="history.php">History</a>
        <a href="javascript:void(0);" class="icon" onclick="showNavigationBar()">
            <span class="fa fa-bars"></span>
        </a>
    </div>

    <div class="container">
        <h1 class="text-center">Inventory</h1>
        <div class="border">
            <div class="table-wrapper">
                <table class="text-center center">
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
                    <tbody>
                        <tr>
                            <td>
                                Resistance band
                            </td>
                            <td>
                                Yellow
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                <a href="#">Details</a>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Resistance band
                            </td>
                            <td>
                                Yellow
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                <a href="#">Details</a>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Resistance band
                            </td>
                            <td>
                                Yellow
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                <a href="#">Details</a>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Resistance band
                            </td>
                            <td>
                                Yellow
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                <a href="#">Details</a>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>