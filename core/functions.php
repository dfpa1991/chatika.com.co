<?php
//Get the IP Address
function getIPAddress()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

//cart
function cart()
{
    global $db;
    $ip = getIPAddress();
    if (isset($_GET['add_cart'])) {
        $pro_id = $_GET['add_cart'];
        $pro_quantity = 1;
        $check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($db, $check_pro);
        if (mysqli_num_rows($run_check) > 0) {
            echo "";
        } else {
            $insert_pro = "INSERT INTO cart (p_id, ip_add, qty) VALUES ('$pro_id','$ip','$pro_quantity')";
            $run_pro = mysqli_query($db, $insert_pro);
            echo "<script>alert('El producto ha sido anadido correctamente')</script>";
            header('location:index.php');
        }
    }
}

//getting the total_items
function total_items()
{
    global $db;
    $ip = getIPAddress();
    if (isset($_GET['add_cart'])) {
        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);

    } else {
        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}

function emailIsUnique($email){
    $database = new Database();
    $db = $database->getConnectionMysql();
    $email = mysqli_real_escape_string($db, $email);
    $query_email = "SELECT * FROM user WHERE email ='$email'";
    $result = mysqli_query($db,$query_email);
    if (mysqli_num_rows($result) > 0){
        return false;
    }else{
        return true;
    }
}

function checkCategory(){

}

function printProducts($pro_title, $pro_id, $pro_image, $pro_price,$pro_desc)
{
    echo "
    <div class='col-md-4' id='splash-pic'>
        <h4 class='text-center'>$pro_title</h4>
            <div class='col-xs-8 center-block'>
            <form class='submit-to-cart' action='add_cart.php' method='post' id='$pro_id'>
                <hr/>
                <a href='details.php?pro_id=$pro_id' id='link$pro_id'><img class='images' src='img/$pro_image' alt=$pro_title id='images$pro_id'/></a>
                <hr/>
                <label for='cantidad-producto' class='control-label'>Cantidad</label>
                <input name='pro-quantity' type='number' max='6' min='1' id='pro-quantity$pro_id' class='form-control' placeholder='1'>
                <label for='cantidad-producto' class='control-label'>Talla: </label>
                <select name='pro-size' id='framework$pro_id' class='form-control'>
                    <option value='S'>S</option>
                    <option value='M'>M</option>
                    <option value='L'>L</option>
                    <option value='XL'>XL</option>
                </select>
                <input name='hidden-name' type='hidden' id='pro-name$pro_id' class='form-control' value='$pro_title'>
                <input name='hidden-name1' type='hidden' id='pro-desc$pro_id' class='form-control' value='$pro_desc'>
                <label for='precio-producto' class='control-label input-price-hidden' id='label-precio-producto'>Precio:
                    <input name='hidden-price' type='hidden' id='pro-price$pro_id' class='form-control' value='$pro_price'>\$" . number_format($pro_price) . "
                    <span id='error_quantity$pro_id'></span>
                </label>
                <hr/>
                <div>
                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#details-$pro_id'>Detalles</button>
                    <button class='btn btn-warning' name='add_to_cart' id=$pro_id type='submit'><span class='glyphicon glyphicon-shopping-cart'></span>Al Carrito</button>                
                </div>
            </form>
        </div>
    </div>
    ";
}

function printProductsDetails($pro_title, $pro_id, $pro_image, $pro_price,$pro_desc)
{
    echo "
        <h2 class='text-center'>Detalles de $pro_title</h2>
        <hr>
        <form action='add_cart.php' method='post'  class='form-horizontal submit-to-cart' id='$pro_id'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-6'>
                        <h3>$pro_title</h3>
                        <a href='#'><img width='300' src='img/$pro_image' alt=$pro_title id='images$pro_id'/></a>
                        <br>                                                        
                    </div>
                    <div class='col-xs-6'>
                        <h3>Detalles</h3>
                        <p>$pro_desc</p>
                        <div class='form-group'>
                            <div class='col-xs-5'>
                                <label for='precio-producto' class='control-label input-price-hidden' id='label-precio-producto'>Precio:
                                <input name='hidden-price' type='hidden' id='pro-price$pro_id' class='form-control' value='$pro_price'>\$" . number_format($pro_price) . "
                                    <span id='error_quantity$pro_id'></span>
                                </label>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-xs-5'>
                                <label for='quantity' id='quantity-label'>Cantidad</label>
                                <input name='pro-quantity' type='number' max='6' min='1' id='pro-quantity$pro_id' class='form-control' placeholder='1'>
                            </div>
                        </div>    
                        <div class='form-group'>
                            <input name='hidden-name' type='hidden' id='pro-name$pro_id' class='form-control' value='$pro_title'>
                            <input name='hidden-name1' type='hidden' id='pro-desc$pro_id' class='form-control' value='$pro_desc'>
                            <div class='col-xs-5'>
                                <label for='size'>Tamano: </label>
                                <select name='size' id='framework$pro_id' class='form-control'>
                                    <option value='S'>S</option>
                                    <option value='M'>M</option>
                                    <option value='L'>L</option>
                                    <option value='XL'>XL</option>
                               </select>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class='row'>
                    <div class='col-md-6'></div>
                        <div class='col-md-6' align='right'>
                        <br>
                        <a href='index.php'><button class='btn btn-default' type='button'><span class='glyphicon glyphicon-arrow-left'></span> Retornar</button></a>
                            <button class='btn btn-warning right' id=$pro_id name='add_to_cart' type='submit'><span class='glyphicon glyphicon-shopping-cart'></span>Al Carrito</button>
                    </div>
                </div>
                <hr>
            </div>    
        </form>
    ";
}

function printProductsNoShoppingCartButton($pro_title, $pro_id, $pro_image, $pro_price)
{
    echo "
    <div class='col-md-4' id='splash-pic'>
        <h4 class='text-center'>$pro_title</h4>
            <div class='col-xs-8 center-block'>
                <hr/>
                <a href='details.php?pro_id=$pro_id'><img class='images' src='img/$pro_image' alt=$pro_title id='images$pro_id'/></a>
                <hr/>
                <input name='hidden-name' type='hidden' id='pro-name$pro_id' class='form-control' value='$pro_title'>
                <label for='precio-producto' class='control-label input-price-hidden' id='label-precio-producto'>Precio:
                    <input name='hidden-price' type='hidden' id='pro-price$pro_id' class='form-control' value='$pro_price'>\$" . number_format($pro_price) . "
                </label>
                <hr/>
                <div>
                  <button type='button' class='btn btn-success' data-toggle='modal' data-target='#details-$pro_id'>Detalles</button>                
                </div>
            </div>
    </div>
    ";
}

function printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price)
{
    echo "
    <div class='modal fade details-$pro_id' id='details-$pro_id' tableindex='-1' role='dialog' aria-labelledby='details-$pro_id' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button class='close' type='button' data-dismiss='modal' aria-label='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h4 class='modal-title text-center'>$pro_title</h4>
                </div>
                <form class='submit-to-cart-modal' action='add_cart.php' method='post' id='$pro_id'>
                    <div class='modal-body'>
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <div class='center-block'>
                                        <img src='img/$pro_image' alt='$pro_title' class='details img-responsive'/>
                                    </div>
                                </div>
                                <div class='col-sm-6'>
                                    <h4>Detalles</h4>
                                    <p>$pro_desc</p>
                                    <hr>
                                    <label for='cantidad-producto' class='control-label'>Cantidad</label>
                                    <input name='pro-quantity-modal' type='number' max='6' min='1' id='pro-quantity-modal$pro_id' class='form-control' placeholder='1'>
                                    <label for='cantidad-producto' class='control-label'>Talla: </label>
                                    <select name='pro-size' id='pro_size_modal$pro_id' class='form-control'>
                                        <option value='S'>S</option>
                                        <option value='M'>M</option>
                                        <option value='L'>L</option>
                                        <option value='XL'>XL</option>
                                    </select>
                                    <input name='hidden-name' type='hidden' id='pro-name-modal$pro_id' class='form-control' value='$pro_title'>
                                    <label for='precio-producto' class='control-label input-price-hidden' id='label-precio-producto'>Precio:
                                        <input name='hidden-price' type='hidden' id='pro-price-modal$pro_id' class='form-control' value='$pro_price'>\$" . number_format($pro_price) . "
                                        <span id='error_quantity$pro_id'></span>
                                    </label>
                                </div>    
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                            <button class='btn btn-warning' id='$pro_id' type='submit'><span class='glyphicon glyphicon-shopping-cart'></span>Al Carrito</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    ";
}

function total_price()
{
    $total = 0;
    global $db;
    $ip = getIPAddress();
    $select_price = "SELECT * FROM cart WHERE ip_add='$ip'";
    $run_price = mysqli_query($db, $select_price);
    while ($p_price = mysqli_fetch_array($run_price)) {
        $pro_id = $p_price['p_id'];
        $pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
        $run_pro_price = mysqli_query($db, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $product_price = array($pp_price['product_price']);
            $values = array_sum($product_price);
            $total += $values;
        }
    }
    echo $total;
}

function getPro()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products ORDER BY RAND () LIMIT 0,6";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProFeatured()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products ORDER BY RAND () LIMIT 0,3";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProductsNoShoppingCartButton($pro_title, $pro_id, $pro_image, $pro_price);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProMenTop()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Men' AND product_type='Top'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price,$pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProWomenTop()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Women' AND product_type='Top'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProMenPantalones()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Men' AND product_type='Pantalones'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProWomenPantalones()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Women' AND product_type='Pantalones'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);

    }
}

function getProAccesorios()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_type='Accesorios'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price,$pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProMenZapatos()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Men' AND product_type='Zapatos'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProWomenVestidos()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Women' AND product_type='Vestido'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}

function getProWomenZapatos()
{
    $database = new Database();
    $db = $database->getConnectionMysql();
    $get_pro = "SELECT * FROM products WHERE product_cat='Women' AND product_type='Zapatos'";
    $run_pro = mysqli_query($db, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_type = $row_pro['product_type'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        printProducts($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
        printModal($pro_id, $pro_title, $pro_image, $pro_desc, $pro_price);
    }
}