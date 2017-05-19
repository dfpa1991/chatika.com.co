<?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
?>
<nav class="navbar navbar-default navbar-collapse navbar-fixed-top" id="navbar">
    <div class="container-fluid">
        <!--<img src="chatika.com%20logo.jpg" width="20" alt="chatika.com" >-->
        <a href="index.php" class="navbar-brand" id="text"><img src="chatika.com%20logo.jpg" alt="chatika.com" ></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#main-navbar-collapse">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                while ($parent = mysqli_fetch_assoc($pquery)) : ;
                    ?>
                    <?php
                    $parent_id = $parent['id'];
                    $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id' ";
                    $cquery = $db->query($sql2);
                    ?>
                    <!--Dropdown Menu-->
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" id="main-menu-links"><?php echo $parent['category']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php while ($child = mysqli_fetch_assoc($cquery)) : ?>
                                <li>
                                    <a href="<?php echo $child['category']; ?>.php<?php if ($parent["category"] == "Women") {
                                        echo "";
                                    } elseif ($parent["category"] == "Men" && $parent["child"] == "Accesorios") {
                                        echo "";
                                    } else {
                                        echo "#" . $parent["category"] ?>-<?php echo $child["category"];
                                    } ?>"><?php echo $child['category']; ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                <?php endwhile; ?>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle account-login-register " id="account-login-register" data-toggle="dropdown">Account <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="" role="button" data-toggle="modal" data-target="#login-modal">Ingresar</a></li>
                        <li><a href="" role="button" data-toggle="modal" data-target="#register-modal">Registrarse</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form" role="search" method="get" action="results.php" enctype="multipart/form-data"
                  id="search_bar">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control pull-right" placeholder="buscar" name="user_query">
                    <button type="submit" name="search" class="invisible"></button>
                    <i class="form-control-feedback glyphicon glyphicon-search"></i>
                </div>
            </form>
        </div>
    </div>
</nav>