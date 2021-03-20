function deleteProduct(id, name, color) {
    var choose = confirm("Really delete " + color.toLowerCase() + " " + name.toLowerCase() + "?");
    if (choose === true) {
        result = deleteProductAjax(id);
    }
}

function updateProduct(id) {
    var name = $("#newName").val();
    var color = $("#newColor").val();
    var quantity = $("#newQuantity").val();

    updateProductAjax(id, name, color, quantity);
}

function showEditBar(id) {
    $("#edit-row").remove();
    readProductAjax(id);
}

function readProductAjax(id) {
    url = window.location.href;
    url = url.substring(0, url.lastIndexOf('/'));
    $.ajax({
        type: "GET",
        url: url + "/backend/api/products/read.php?id=" + id,
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            var newRow = getRowFromProduct(result);
            $("#product-row-" + id).after(newRow);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function updateProductAjax(id, name, color, quantity) {
    var dataValue = { "id": id, "name":name, "color":color, "quantity":quantity };
    url = window.location.href;
    url = url.substring(0, url.lastIndexOf('/'));
    $.ajax({
        type: "GET",
        url: url + "/backend/api/products/update.php",
        contentType: "application/json",
        dataType: "json",
        data: dataValue,
        success: function (result) {
            $("#edit-row").remove();
            $("#actions-" + id).empty();
            $("#actions-" + id).append("<span style=\"color:orange\">Updated</span>");

            console.log(result);

            $("#product-column-name-" + id).text(result.name);
            $("#product-column-color-" + id).text(result.color);
            $("#product-column-quantity-" + id).text(result.quantity);
        },
        error: function (error) {
            console.log(error);
        }
    });

}

function deleteProductAjax(id) {

    url = window.location.href;
    url = url.substring(0, url.lastIndexOf('/'));
    $.ajax({
        type: "GET",
        url: url + "/backend/api/products/delete.php?id=" + id,
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            $("#actions-" + id).empty();
            $("#actions-" + id).append("<span style=\"color:red\">Deleted</span>");
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getRowFromProduct(result) {
    console.log(result);
    var newRow = "<tr id=\"edit-row\">" + 
                    "<td><input id=\"newName\" style=\"width:100px\" value=\"" + result.name + "\" class=\"text-center\"></td>" +
                    "<td><input id=\"newColor\" style=\"width:100px\" value=\"" + result.color + "\" class=\"text-center\"></td>" +
                    "<td><input id=\"newQuantity\" style=\"width:100px\" value=\"" + result.quantity + "\" class=\"text-center\"></td>" +
                    "<td></td>" +
                    "<td><input type=\"submit\" onclick=\"updateProduct(" + result.id + ")\" style=\"width:100px\" value=\"Save\" class=\"text-center\"></td>" +
                 "</tr>";

    return newRow;
}