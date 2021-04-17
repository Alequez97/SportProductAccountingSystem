function addProductToBasket() {
    var name = $("#name").val();
    var color = $("#color").val();
    var quantity = $("#quantity").val();

    clearInputs();

    url = window.location.href;
    url = url.substring(0, url.lastIndexOf('/'));

    dataValue = { "name": name, "quantity": quantity, "color": color };

    $.ajax({
        type: "GET",
        contentType: "application/json",
        dataType: "json",
        url: url + "/backend/api/products/basket/add.php",
        data: dataValue,
        success: function (result) {
            console.log(result);

            var newRow =    "<tr>" +
                                "<td>" + result.name + "</td>"+
                                "<td>" + result.color + "</td>"+
                                "<td>" + result.quantity + "</td>"+
                                "<td><a>Edit</a><a>Delete</a></td>"+
                            "</tr>"

            $("#cart-table").append(newRow);

            $("#cart-table-wrapper").css("display", "block");
            $("#empty-basket-message").css("display", "none");
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function showProductBasket() {
    var basket = $("#basket");

    var basketIsVisible = basket.is(":visible");

    if (basketIsVisible) {
        basket.css("display", "none");
        $("#show-basket-button").text("Show basket");
    }
    else {
        basket.css("display", "block");
        $("#show-basket-button").text("Hide basket");
    }
}

function clearInputs() {
    $("#name").val("");
    $("#color").val("");
    $("#quantity").val("");
}