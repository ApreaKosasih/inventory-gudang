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
                    <li class="">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    <h3 class="menu-title">Data Master</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Data Barang</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-file"></i><a href="manage_laporan.php">Laporan</a></li>
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

                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="">Lupa Password</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

    <?php include_once("./templates/header.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Data Master</a></li>
                            <li><a href="#">Data Barang</a></li>
                            <li class="active">Stok Akhir</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table Barang</strong>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th>Supplier</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="get_product">
                                <!--<tr>
                                    <td>1</td>
                                    <td>Electronics</td>
                                    <td>Root</td>
                                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <?php
		include_once("./templates/update_products.php");
	?>

</body>
</html>
