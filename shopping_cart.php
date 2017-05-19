<div class='col-xs-10 center-block' id="order_table">
    <?php
    if (!empty($_SESSION["shopping_cart"])) { ?>
        <table id="" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Nombre Producto</th>
                <th style="width:10%">Precio</th>
                <th style="width:8%">Cantidad</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?php echo $values["p_image"]; ?>" width="100"
                                                                 alt="..."
                                                                 class="img-responsive"/></div>
                            <div class="col-xs-10">
                                <h4 class="nomargin"><?php echo $values["p_name"]; ?></h4>
                                <p><?php echo $values["p_desc"]; ?></p>
                                <p><strong>Talla: </strong><?php echo $values['p_size']; ?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">$<?php echo number_format($values["p_price"]); ?></td>
                    <td data-th="Quantity">
                        <input type="number" name="quantity[]" data-product_id="<?php $values["p_id"]; ?>"
                               id="quantity<?php echo $values["p_id"] ?>"
                               class="form-control text-center quantity"
                               value="<?php echo $values["p_quantity"]; ?>">
                    </td>
                    <td data-th="Subtotal"
                        class="text-center">
                        $<?php echo number_format($values["p_price"] * $values["p_quantity"]); ?></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm refresh"><i class="glyphicon glyphicon-refresh"></i></button>
                        <button name="delete-product-shopping-cart" id="remove-product-id<?php echo $values["p_id"]; ?>"
                                class="btn btn-danger btn-sm delete-product"><i
                                    class="glyphicon glyphicon-remove"></i></button>
                    </td>
                </tr>
                <?php
                $total = $total + ($values["p_price"] * $values["p_quantity"]);
            } ?>
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>$<?php echo number_format($total); ?></strong></td>
            </tr>
            <tr>
                <td><a href="" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total: $<?php echo number_format($total); ?></strong></td>
                <td>
                    <form method="post" action="cart.php">
                        <button type="submit" name="place_order" class="btn btn-success">Checkout</button>
                    <form>
                </td>
            </tr>
            </tfoot>
        </table>
        ';
    <?php } else { ?>
        <div class="col-xs-10 center-block">
            <h4 class="text-center">No hay nada en el carrito</h4>
            <p class="text-center">Selecciona productos para agregar</p>
            <hr>
            <p align="center"><a href="" class="btn btn-warning">Sigue Comprando</a></p>
        </div>
    <?php } ?>
</div>