<?php
include 'core/Database.php';
session_start();
$database = new Database();
$db = $database->getConnectionMysql();

if (isset($_POST["id"])) {
    $order_table = '';
    $message = '';
    $span_nav = '';
    //echo 'Server Says: '.$_POST['img'];
    //print_r($_SESSION["shopping_cart"]);
    if ($_POST["action"] == "add") {
        if (isset($_SESSION["shopping_cart"])) {
            $is_available = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                if ($_SESSION["shopping_cart"][$keys]["product_id"] == $_POST["id"]) {
                    $is_available++;
                    $_SESSION["shopping_cart"][$keys]["product_quantity"] = $_SESSION["shopping_cart"][$keys]["product_quantity"] + $_POST["quantity"];
                }
            }
            if ($is_available < 1) {
                $item_array = array(
                    'p_id' => $_POST["id"],
                    'p_name' => $_POST["name"],
                    'p_price' => $_POST["price"],
                    'p_quantity' => $_POST["quantity"],
                    'p_size' => $_POST['size'],
                    'p_desc' => $_POST['desc'],
                    'p_image' => $_POST['img']
                );
                //print_r($item_array);
                $_SESSION["shopping_cart"][] = $item_array;
                //print_r($_SESSION["shopping_cart"]);
            }
        } else {
            //If there is no items in the array shopping cart add $item_array to $_SESSION["shopping_cart"]
            $item_array = array(
                'p_id' => $_POST["id"],
                'p_name' => $_POST["name"],
                'p_price' => $_POST["price"],
                'p_quantity' => $_POST["quantity"],
                'p_size' => $_POST['size'],
                'p_desc' => $_POST['desc'],
                'p_image' => $_POST['img']
            );
            $_SESSION["shopping_cart"][] = $item_array;
        }
    }

    //Remove items from the shopping cart using the remove button that is on the side
    if ($_POST["action"] == "remove") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["p_id"] == $_POST["id"]) {
                if ($values["p_size"] == $_POST['size']) {
                    unset($_SESSION["shopping_cart"][$keys]);
                }
            }
        }
    }

    if ($_POST["action"] == "quantity_change") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($_SESSION["shopping_cart"][$keys]["p_id"] == $_POST["id"]) {
                $_SESSION["shopping_cart"][$keys]["p_quantity"] = $_POST["quantity_c"];
            }
        }
    }

    if (!empty($_SESSION["shopping_cart"])) {
        $total = 0;
        $order_table .= '
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
        ';
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $order_table .= '
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="' . $values["p_image"] . '" width="100" alt="..."
                                                         class="img-responsive"/></div>
                            <div class="col-xs-10">
                            <h4 class="nomargin">' . $values["p_name"] . '</h4>
                            <p>' . $values["p_desc"] . '</p>
                            <p><strong>Talla: </strong> ' . $values['p_size'] . '</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">$' . number_format($values["p_price"]) . '</td>
                <td data-th="Quantity">
                    <input type="hidden" id="size' . $values["p_id"] . '" value="' . $values["p_size"] . '">
                    <input type="number" name="quantity[]" data-product_id="' . $values["p_id"] . '" id="quantity' . $values["p_id"] . '" min="1" max="6" class="form-control text-center quantity" value="' . $values["p_quantity"] . '">           
                </td>
                <td data-th="Subtotal" class="text-center">$' . number_format($values["p_price"] * $values["p_quantity"]) . '</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm pro-quantity" id="refresh' . $values["p_id"] . '"><i class="glyphicon glyphicon-refresh"></i></button>
                    <button name="delete-product-shopping-cart" id="' . $values["p_id"] . '" class="delete-product btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></button>
                </td>
            </tr>
            ';
            $span_nav .= '
            <li>
                <span class="item">
                    <span class="item-left">
                        <img src="' . $values["p_image"] . '" width="50"  alt="' . $values["p_image"] . '"/><span class="item-info"><span>' . $values["p_name"] . '</span><span>$' . number_format($values["p_price"]) . '</span>
                    </span>
            </span>
            </li>
            ';
            $total = $total + ($values["p_price"] * $values["p_quantity"]);
        }
        $span_nav .= '
            <li class="divider"></li>
                <li><a class="text-center" data-toggle="tab" id="view-cart" href="#cart">View Cart</a>
            </li>
        ';
        $order_table .= '</tbody>';
        $order_table .= '
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>' . number_format($total) . '</strong></td>
        </tr>
        <tr>
            <td><a href="" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total: $' . number_format($total) . '</strong></td>
            <td>
                <form method="post" action="cart.php" >
                    <button type="submit" name="place_order" class="btn btn-success">Checkout</button>
                <form>
            </td>
        </tr>
        </tfoot>
        ';
    } else {
        $order_table = '
        <div class="col-xs-10 center-block">
            <h4 class="text-center">No hay nada en el carrito</h4>
            <p class="text-center">Selecciona productos para agregar</p>
            <hr>
            <p align="center"><a href="" class="btn btn-warning">Sigue Comprando</a></p>
        </div>
        ';
        $span_nav = '
        <li>
            <span class="item">
            <span class="item-left">
            <span class="item-info"><span></span><span>No hay Items en el Carrito</span>
            </span>
            </span>
        </li>
        ';
    }

    $order_table .= '</table>';
    $output = array(
        'span_nav' => $span_nav,
        'order_table' => $order_table,
        'cart_item' => count($_SESSION["shopping_cart"])
    );
    echo json_encode($output);
}



