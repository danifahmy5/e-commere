<?php

    session_start();
    include_once ("function/koneksi.php");
    include_once ("function/helper.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level =  isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang =  isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);
    // var_dump($level);

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dros | Dani fahmy rosyid</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/coba.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="js/jquery-3.3.1.min.js"></script>

</head>
<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">D<b>'CELL</b></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Master data</h3>
                    <li class='menu-item-has-children dropdown'>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Kategori</a>
                    <?php
                        echo kategori($kategori_id);
                    ?>
                    </li>
                    <?php if ($level == "superadmin") { ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dashboard"></i>MENU ADMIN</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i>
                                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
                            </li>
                            <li><i class="fa fa-barcode"></i>
                                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Barang</a>
                            </li>
                            <li><i class="fa fa-id-badge"></i>
                                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">User</a>
                            </li>
                            <li><i class="fa fa-bell"></i>
                                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>">Banner</a>
                            </li>
                            <li><i class="fa fa-bell"></i>
                                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">pesanan</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                <ul class="nav navbar-nav">
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-12">
                    <a class="navbar-brand float-right" href="<?php echo BASE_URL; ?>">
                        D<b>'CELL</b>
                    </a>
                </div>                
            </div>
        </header>
        <div class="breadcrumbs">
            <div class="col-sm-12">
            <div class="user mt-1 float-left">
                    <?php
                        if ($user_id){
                            echo "Hi <b>$nama</b>,
                                <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'> my_profil</a>
                                <a href='".BASE_URL."logout.php'>Logout</a>";
                        }else{
                                            echo "<a class='mr-2' href='".BASE_URL."login.html'>Login</a>
                                                    <a href='".BASE_URL."register.html'>Register</a>";

                        }
        
                    ?>
            </div>           
            <div class="page-keranjang float-right">
                    <a href="<?php echo BASE_URL."keranjang.html";?>" class="button-keranjang float-right">
                    <i class="fa fa-shopping-cart text-white"></i> 
                    <?php 
                        if($totalBarang != 0) {
                            echo "<span class='total-barang'>$totalBarang</span>";
                        }
                    ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <?php
                            $filename = "$page.php";

                            if (file_exists($filename)) {
                                include_once($filename);
                                }else{
                                include_once("main.php");  
                            }
                            ?>

        </div>  <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
            $(function() {
              $('#slides').slidesjs({
                height: 350,
                play: { auto : true,
                        interval : 3000
                      },
                navigation : false
              });
            });
        </script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    

</body>
</html>
