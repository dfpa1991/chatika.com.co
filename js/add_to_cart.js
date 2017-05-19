/**
 * Created by root on 5/10/17.
 */
$(document).ready(function () {

    $(document).on('click', '.delete-product', function () {
        var product_id = $(this).attr('id');
        var product_size = $('#size' + product_id).val();
        //alert('Id'+product_id);
        var url = "add_cart.php";
        var action = "remove";
        if (confirm("Quieres Remover el producto")) {
            $.ajax({
                url: url,
                data: {
                    id: product_id,
                    size:product_size,
                    action: action
                },
                method: "POST",
                dataType: "json",
                success: function (data) {
                    $('#order_table').html(data.order_table);
                    $('#badge1').text(data.cart_item);
                    $('#badge').text(data.cart_item);
                    $('#span-nav').html(data.span_nav);
                }
            });
        } else {
            return false;
        }
    });


    $('.submit-to-cart').submit(function (e) {
        e.preventDefault();
        var product_id = $(this).attr("id");
        var product_name = $('#pro-name' + product_id).val();
        var product_price = $('#pro-price' + product_id).val();
        var product_quantity = $('#pro-quantity' + product_id).val();
        var product_description = $('#pro-desc' + product_id).val();
        var product_size = $('#framework' + product_id).val();
        var product_image = $('#images' + product_id).attr('src');
        var action = "add";
        var url = $(this).attr("action");
        //alert(" Id: " + product_id + " Nombre: " + product_name + " Precio: " + product_price + " Cantidad: " + product_quantity + " Talla: " + product_size + " url: "+ url);
        if (product_quantity > 0) {
            //alert(" Id: " + product_id + " Nombre: " + product_name + " Precio: " + product_price + " Cantidad: " + product_quantity + " Talla: " + product_size + "url: "+ url);
            $.ajax({
                url: url,
                data: {
                    id: product_id,
                    name: product_name,
                    price: product_price,
                    desc: product_description,
                    quantity: product_quantity,
                    size: product_size,
                    img: product_image,
                    action: action
                },
                method: "POST",
                dataType: "json",
                success: function (data) {
                    $('#badge1').text(data.cart_item);
                    $('#badge').text(data.cart_item);
                    $('#order_table').html(data.order_table);
                    $('#span-nav').html(data.span_nav);
                    $('#alert-user-cart').html(
                        '<div class="col-xs-10 center-block" id="alert-alert-add-cart">' +
                        '<div class="alert alert-info alert-dismissable">' +
                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                        '<strong>Felicitaciones!</strong> Producto Anadido a Carrito' +
                        '</div>' +
                        '</div>'
                    );
                    $('#pro-quantity' + product_id).val('');
                }
            });
        } else {
            $("#error_quantity" + product_id).html("<div class='alert alert-danger alert-dismissable'>" +
                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                "<strong>Inserte cantidad</strong>" +
                "</div>");
        }
    });

    $(document).on('keyup', '.quantity', function (e) {
        if (e.which === 13) {
            var product_id = $(this).data("product_id");
            var pro_quantity = $(this).val();
            var url = "add_cart.php";
            var action = "quantity_change";
            if (pro_quantity !== '') {
                if (pro_quantity > 0 && pro_quantity < 7) {
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            id: product_id,
                            quantity_c: pro_quantity,
                            action: action
                        },
                        dataType: "json",
                        success: function (data) {
                            $('#order_table').html(data.order_table);
                        }
                    });
                }
            }
        }
    });
    /*$('.quantity').keypress(function (e) {
     if(e.which === 13){
     var product_id = $(this).attr("data-product_id");
     alert('hola'+ product_id);
     }
     });*/

    $(document).on('click', '.refresh', function () {
        //location.reload();
    });

});