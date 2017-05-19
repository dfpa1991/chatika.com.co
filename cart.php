<?php
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/nav-shopping-cart.css">
    <link rel="stylesheet" href="css/shopping-cart.css">
    <link rel="stylesheet" href="css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
    <script src="js/add_to_cart.js"></script>
    <script src="js/modal-add-to-cart.js"></script>
    <script src="js/modal-login.js"></script>
    <script src="js/modal-register.js"></script>
    <title>Chatika.com - Cart</title>
</head>
<body>
<!--Navbar Main-->
<?php include 'navbar-main.php' ?>
<!--Navbar Shopping Cart-->
<?php include 'navbar-shopping-cart.php'; ?>
<div class="container-fluid">
    <?php
    if (isset($_POST["place_order"])) {
        $insert_order = "INSERT INTO tbl_order (customer_id, creation_date, order_status) VALUES ('" . $_SESSION["customer_id"] . "','" . date('Y-m-d') . "','pending')";
        $order_id = "";
        if (mysqli_query($db, $insert_order)) {
            $order_id = mysqli_insert_id($db);
        }
        $_SESSION["order_id"] = $order_id;
        $order_details = "";
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $order_details .= "INSERT INTO tbl_order_details (order_id, product_name, product_price, product_quantity) VALUES ('.$order_id.','" . $values["p_name"] . "','" . $values["p_price"] . "','" . $values["p_quantity"] . "')";
            echo $order_details;
        }
        if (mysqli_multi_query($db, $order_details)) {
            unset($_SESSION["shopping_cart"]);
            echo '<script>alert("Pedido Anadido")</script>';
            echo '<script>window.location.href="cart.php"</script>';
        } else {
            echo 'se putio';
        }
    }

    if (isset($_SESSION["order_id"])) {
        $customer_details = '';
        $order_details = '';
        $total = 0;
        $query = 'SELECT * FROM tbl_order INNER JOIN tbl_order_details ON tbl_order_details.order_id = tbl_order.order_id INNER JOIN user ON user.id = tbl_order.customer_id WHERE tbl_order.order_id ="' . $_SESSION["order_id"] . '"';
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($result)) {
            $customer_details = '
            <label>' . $row["username"] . '</label>
            <p>' . $row["address"] . '</p>
            <p>' . $row["city"] . '</p>
            <p>' . $row["postal"] . '</p>
            <p>' . $row["country"] . '</p>
            ';
            $order_details .= '
            <tr>
                <td>' . $row["creation_date"] . '</td>
                <td>' . $row["product_name"] . '</td>
                <td>' . $row["product_quantity"] . '</td>
                <td>$' . number_format($row["product_price"]) . '</td>
                <td>$' . number_format($row["product_quantity"] * $row["product_price"]) . '</td>
            </tr>    
            ';
            $total = $total + ($row["product_quantity"] * $row["product_price"]);
        }
        echo '
        <h3 align="center">Order Summary for Order No. ' . $_SESSION["order_id"] . '</h3>
        <div style="border: solid 1px #e2dfd5; " class="col-xs-10 center-block table-responsive">
            <table class="table">
                <tr><label>Detalles de Cliente</label></tr>
                <tr><td>' . $customer_details . '</td></tr>
                <tr><td><label>Detalles de La Orden</label></td></tr>
                <tr>
                    <td>
                        <table class="table-bordered">
                            <tr>
                                <th width="20%">Fecha</th>
                                <th width="50%">Nombre Producto</th>
                                <th width="15%">Cantidad</th>
                                <th width="15%">Precio</th>
                                <th width="20%">Subtotal</th>
                            </tr>
                            ' . $order_details . '
                            <tr>
                                <td></td>
                                <td colspan="3" align="right"><label>Total</label></td>
                                <td>$' . number_format($total) . '</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        ';
    }
    ?>
</div>
</body>
</html>