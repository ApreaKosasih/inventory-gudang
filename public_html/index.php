<?php

include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
    header("location:".DOMAIN."/dashboard.php");
}
?>


<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventory PT.KEP Login</title>

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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/kresna.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="form_login" onsubmit="return false">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Email">
                            <small id="e_error" class="form-text text-muted">Masukan Email Dengan Benar "example@example.com</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
                            <small id="p_error" class="form-text text-muted"></small>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Ingat Saya
                            </label>
                            <label class="pull-right">
                                <a href="#">Lupa Password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                        <br>    
                        <p>Belum Punya Akun ? <a href="register.php"> Daftar</a></p>
                        </div>
                    </form>
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
