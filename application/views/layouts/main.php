<!DOCTYPE html>
<html lang="en" ng-app="admin.app" ng-controller="AdminController">

<head>
  <title>{{title}}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/main.css');?>">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
  <div ng-include="header"></div>
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <div ng-include="menu"></div>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>{{dashboard}}</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url}}{{dashboard | lowercase}}">{{dashboard}}</a></li>
      </ul>
    </div>
    <div class="row">
      <?php                    
        if(isset($_view) && $_view)
        $this->load->view($_view);
      ?>
    </div>
  </main>
  <script src="<?= site_url('assets/js/jquery-3.2.1.min.js');?>"></script>
  <script src="<?= site_url('assets/js/angular/angular.min.js');?>"></script>
  <script src="<?= site_url('assets/js/js/admin.app.js');?>"></script>
  <script src="<?= site_url('assets/js/js/services/admin.services.js');?>"></script>
  <script src="<?= site_url('assets/js/js/helpers/helper.services.js');?>"></script>
  <script src="<?= site_url('assets/js/js/controllers/admin.controllers.js');?>"></script>


  <script src="<?= site_url('assets/js/popper.min.js');?>"></script>
  <script src="<?= site_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?= site_url('assets/js/main.js');?>"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?= site_url('assets/js/plugins/pace.min.js');?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
          m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
</body>

</html>