<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:".DOMAIN."/");
}
?>



<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventory PT.KEP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="images/kresnalogo.png" style="width:50%;" alt="Logo"></a>
                <a class="navbar-brand hidden"><img src="images/kresnalogo2.png" style="width:100%;" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    <h3 class="menu-title">Data Master</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Data Barang</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-file"></i><a href="Manage_laporan.php">Laporan</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_product.php">Stok Akhir</a></li>
                                    
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tabel Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="manage_categories.php">Kategori</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="manage_brand.php">Supplier</a></li>

                            
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

                <?php
                 include_once("./templates/header.php"); 
                 ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Success</span> Selamat Datang Admin.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>


   <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_category">Tambah Baru</a>
                            <a class="dropdown-item" href="manage_categories.php">Manage</a>
                            
                        </div>
                    </div>
                </div>
                <!--
                <h4 class="mb-0">
                    <span class="count">168</span>
                </h4>
                -->
                <p class="text-light">Kategori</p>

                

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_brand">Tambah Baru</a>
                            <a class="dropdown-item" href="manage_brand.php">Manage</a>
                            
                        </div>
                    </div>
                </div>
                
                <p class="text-light">Supplier</p>

                

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_products">Tambah Baru</a>
                            <a class="dropdown-item" href="manage_product.php">Manage</a>

                        </div>
                    </div>
                </div>
                
                <p class="text-light">Barang</p>

            </div>    
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-12">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body">
           
						        <h4 class="card-title">Barang Keluar</h4>
						        <p class="text-light">Buat Daftar Barang Keluar Disini</p>
						        <a href="new_order.php" class="btn btn-dark float-right">Buat Daftar</a>

            </div>
        </div>
    </div>

    


</div> <!-- .content -->
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

    <?php
		include_once("./templates/category.php");
	?>

	<?php
		include_once("./templates/brand.php");
	?>

    <?php
		include_once("./templates/products.php");
	?>

</body>
</html>