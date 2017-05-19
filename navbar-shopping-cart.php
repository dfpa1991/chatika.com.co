<?php
//Determine the items in the shopping cart
$num_items = 0;
if (isset($_SESSION["shopping_cart"])) {
    $num_items = count($_SESSION["shopping_cart"]);
}
?>
<!--navigation bar included into functions.php file -->
<nav class="navbar navbar-default navbar-collapse center-block" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="sr-only"></span>Hola <?php if (isset($_SESSION['username'])) {
                            echo " " . $_SESSION['username'] . " " . $_SESSION['customer_id'];
                        } else {
                            echo "Guest";
                        } ?></a></li>
                <?php
                if (isset($_SESSION['username'])) { ?>
                    <li class="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mi Cuenta<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="" role="button" id="order-index-link">Mis Ordenes</a></li>
                            <li><a href="" role="button" id="edit-index-link">Editar Cuenta</a></li>
                            <li><a href="" role="button" id="change-password-link">Cambiar Password</a></li>
                            <li><a href="" role="button" id="logout-index-link">Logout </a></li>
                            <li class="divider"></li>
                            <li id="erase-account"><a href="account.php" role="button" class="btn btn-danger text-center">Borrar Cuenta</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span
                                class="glyphicon glyphicon-shopping-cart"></span> <i
                                id="badge"><?php echo $num_items; ?></i> - Items <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-cart" role="menu" id="span-nav">
                        <?php
                        if (isset($_SESSION["shopping_cart"])) {
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                                <li>
                                    <span class="item">
                                    <span class="item-left">
                                        <img src="<?php echo $values["p_image"]; ?>" width="50"
                                             alt="<?php echo $values["p_image"]; ?>"/>
                                        <span class="item-info"><span><?php echo $values["p_name"]; ?></span><span>$<?php echo number_format($values["p_price"]) ?></span>
                                    </span>
                                    </span>
                                </li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><a class="text-center" data-toggle="tab" id="view-cart" href="#cart">View Cart</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <span class="item">
                                <span class="item-left">
                                        <span class="item-info"><span></span><span>No hay Items en el Carrito</span>
                                </span>
                                </span>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>