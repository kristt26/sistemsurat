<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= site_url()?>assets/img/logo/Logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/angular/angular.js"></script>
    <title>Login - Manajemen Surat</title>
</head>
<body ng-app="auth.app" ng-controller="AuthController">
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <img src="assets/img/logo/Logo.png">
        </div>
        <div class="logo text-center">
            <h1 style="color: white">Manajemen Berkas dan Surat<br>STIMIK Sepuluh Nopember Jayapura</h1>
        </div>
        <div class="login-box">
            <form class="login-form" ng-submit="login()">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="text" ng-model="model.username" placeholder="username" autofocus
                        required>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" ng-model="model.password"
                        required>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>
                            Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>
    <script src="<?= site_url()?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= site_url('assets/js/angular/angular.min.js');?>"></script>
    <script src="<?= site_url('assets/js/js/auth.app.js');?>"></script>
    <script src="<?= site_url('assets/js/js/services/auth.services.js');?>"></script>
    <script src="<?= site_url('assets/js/js/helpers/helper.services.js');?>"></script>
    <script src="<?= site_url('assets/js/js/controllers/auth.controller.js');?>"></script>
    <script src="<?= site_url()?>assets/js/popper.min.js"></script>
    <script src="<?= site_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= site_url()?>assets/js/main.js"></script>
    <script src="<?= site_url()?>assets/js/plugins/pace.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function () {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>