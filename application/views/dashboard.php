<div class="col-md-12" ng-controller="HomeController">
  <div class="row">
    <div class="col-md-6 col-lg-6">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-envelope-o fa-3x"></i>
        <div class="info">
          <h4>Total Surat</h4>
          <p><b>{{totalSurat}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-6">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Jumlah Sturktural</h4>
          <p><b>{{totalStruktur}}</b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header d-flex">
          <div class="col-md-9">
            <h3 class="card-title">Grafik Presentase</h3>
          </div>
          <div class="col-md-3 pull-right">
            <select class="form-control" ng-options="item as item for item in jenis"
              ng-model="itemjenis" ng-change="showData()"></select>
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart" class="chartjs" width="770" height="385"
            style="display: block; width: 770px; height: 385px;"></canvas>
        </div>
      </div>
      </div>
  </div>