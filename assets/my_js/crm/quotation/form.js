$(document).ready(function () {

    $('#modal-default').on('click', '.add-product-to-quotation-line', function () {
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: site_url + "/products/one/" + id,
            dataType: "json",
            success: function (data) {
                $('#quotation-line tbody').append("<tr>" +
                    "<td><input name='product_name[]' value='" + data['name'] + "' hidden>" + data['name'] + "</td>" +
                    "<td><textarea name='product_description[]' hidden>" + data['description'] + "</textarea>" + data['description'].replace(/\n/g, "<br>") + "</td>" +
                    "<td><input name='product_price[]' value='" + data['price'] + "' hidden>" + data['price'] + "</td>" +
                    "<td><input name='price_customer[]' value='" + data['price'] + "' style='width:100px'></td>" +
                    "<td><button type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button></td>" +
                    "</tr>");
            }
        });
    });

    $('#quotation-line tbody').on('click', 'button[type="button"]', function (e) {
        $(this).closest('tr').remove()
    })
});