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
		
		<div id="right-panel" class="right-panel">

<?php include_once("./templates/header.php"); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>Barang Keluar</h4>
				  </div>
				  <div class="card-body">
				  	<form id="get_order_data" onsubmit="return false">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Tanggal Keluar</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Tujuan*</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Masukan Nama" required/>
				  			</div>
				  		</div>


				  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Pilih Barang</h3>
									<br/>
				  				<table align="center" style="width:800px;">
		                            <thead>
		                              <tr>
		                                <th>#</th>
		                                <th style="text-align:center;">Nama Barang</th>
		                                <th style="text-align:center;">Stok Barang</th>
		                                <th style="text-align:center;">Quantity</th>
		                                <th style="text-align:center;">Harga</th>
		                                <th>Total</th>
		                              </tr>
		                            </thead>
		                            <tbody id="invoice_item">
		<!--<tr>
		    <td><b id="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm" required>
		            <option>Washing Machine</option>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
		    <td>Rs.1540</td>
		</tr>-->
		                            </tbody>
		                        </table> <!--Table Ends-->
		                        <center style="padding:10px;">
		                        	<button id="add" style="width:150px;" class="btn btn-success">Tambah</button>
		                        	<button id="remove" style="width:150px;" class="btn btn-danger">Hapus</button>
		                        </center>
														<br/>
				  			</div> <!--Crad Body Ends-->
				  		</div> <!-- Order List Crad Ends-->

				  	<p></p>
                    <div class="form-group row">
                      <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required/>
                      </div>
                    </div>
                    <!--
                    <div class="form-group row">
                      <label for="gst" class="col-sm-3 col-form-label" align="right">GST (18%)</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="gst" class="form-control form-control-sm" id="gst" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                      <div class="col-sm-6">
                        <input type="text" name="discount" class="form-control form-control-sm" id="discount" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required/>
                      </div>
                    </div>
                    -->
                    <div class="form-group row">
                      <label for="paid" class="col-sm-3 col-form-label" align="right">Pembayaran</label>
                      <div class="col-sm-6">
                        <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="due" class="col-sm-3 col-form-label" align="right">Sisa</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="payment_type" class="col-sm-3 col-form-label" align="right">Metode Pembayaran</label>
                      <div class="col-sm-6">
                        <select name="payment_type" class="form-control form-control-sm" id="payment_type" required/>
                          <option>Cash</option>
                          <option>Card</option>
                          <option>Draft</option>
                          <option>Cheque</option>
                        </select>
                      </div>
                    </div>

                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
                      <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                    </center>

<br>
				  	</form>

				  </div>
				</div>
			</div>
		</div>
	</div>
	</div>

		<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
		
	


</body>
</html>