/**
 * Created by root on 5/15/17.
 */
$(document).ready(function () {
    $('.submit-to-cart-modal').submit(function (e) {
       e.preventDefault();
        var product_id_modal = $(this).attr("id");
        var product_name_modal = $('#pro-name-modal' + product_id_modal).val();
        var product_price_modal = $('#pro-price-modal'+product_id_modal).val();
        var product_quantity_modal = $('#pro-quantity-modal'+product_id_modal).val();
        var product_size_modal = $('#pro_size_modal'+product_id_modal).val();
        alert(" Id: " + product_id_modal + " Nombre: " + product_name_modal + " Precio: " + product_price_modal + " Cantidad: " + product_quantity_modal + " Talla: " + product_size_modal);
    });
});