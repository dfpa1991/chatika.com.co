<!doctype html>
<?php
include '../core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
if (!isset($_SESSION['admin-user'])) {
    header('location:index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Insert New Products</title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container">
        <a href="index.php" class="navbar-brand" id="text">Chatika.com.co - Admin Area</a>
        <ul class="nav navbar-nav">
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="container" id="form_insert_products">
            <form class="form-horizontal" action="insert_products.php" method="post" enctype="multipart/form-data">
                <h4 class="control-label" id="insert_products">Insertar Nuevos Productos</h4>
                <div class="form-group">
                    <label for="product-title" class="control-label col-xs-2">Nombre Producto: </label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="product-title" name="product_title"
                               placeholder="Nombre"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-category" class="control-label col-xs-2">Categoria Producto: </label>
                    <div class="col-xs-10">
                        <select class="form-control" id="product-category" name="product_cat" required>
                            <option>Selecciona Una Categoria</option>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                            <option value="Boy">Boy</option>
                            <option value="Girl">Girl</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-category" class="control-label col-xs-2">Categoria Producto: </label>
                    <div class="col-xs-10">
                        <select class="form-control" id="product-type" name="product_type" required>
                            <option>Selecciona Un Tipo</option>
                            <option value="Top">Top</option>
                            <option value="Pantalones">Pantalones</option>
                            <option value="Zapatos">Zapatos</option>
                            <option value="Accesorios">Accesorios</option>
                            <option value="Vestido">Vestido</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-price" class="control-label col-xs-2">Precio Producto: </label>
                    <div class="col-xs-10">
                        <input type="number" min="5000" max="1000000" class="form-control" id="product-price"
                               name="product_price" placeholder="Precio" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-image" class="control-label col-xs-2">Imagen Producto: </label>
                    <div class="col-xs-10" id="file-chooser">
                        <input type="file" id="product-image" name="product_image" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-description" class="control-label col-xs-2">Descripcion Producto: </label>
                    <div class="col-xs-10">
                <textarea class="form-control" id="product-description" name="product_desc"
                          placeholder="Ingrese la Descripcion del Producto"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-keywords" class="control-label col-xs-2">Palabras Clave Producto: </label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="product-keywords" name="product_keywords"
                               placeholder="Palabras Clave" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="reset" class="btn btn-default">Borrar</button>
                        <button type="submit" name="insert_post" class="btn btn-primary" id="register">Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php echo "
        <div class='container' id='logout-button'>
            <div class='col-md-6'></div>
            <div class='col-md-6' align='right'>
                <div class='form-group'>
                    <a href='logout.php'><button type='submit' class='btn btn-primary' id='register'>Logout " . $_SESSION['admin-user'] . "</button></a>
                </div>
            </div>
        </div>
        ";
        ?>
    </div>
</div>
</body>
</html>
<?php

//Check file is an image

if (isset($_POST['insert_post'])) {

    //Getting the text data from the fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_type = $_POST['product_type'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    //Check file is an image
    $product_image = $_FILES['product_image']['name'];
    $product_image_check = ($_FILES['product_image']['tmp_name']);
    move_uploaded_file('img/',$product_image_check);
    //SQL Query
    $insert_product = "INSERT INTO products (product_cat, product_type, product_title, product_price, product_desc, product_image, product_keywords) VALUES ('$product_cat','$product_type', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
    //Insert Data into the database chatika
    $insert_pro = mysqli_query($db, $insert_product);
    //Check the file is an image
    if ($insert_pro) {
        echo '<script>alert("El producto ha sido agregado correctamente")</script>';
        header('location:insert_products.php');
    }

}


?>