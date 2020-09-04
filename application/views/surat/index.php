<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap/dist/css/bootstrap.css">
<div class="col-md-12" ng-controller="SuratController">
  <div class="row">
    <div class="col-md-3"><a class="mb-2 btn btn-default btn-block" href="" id="addClass"><i class="fa fa-pencil"></i>
        Compose Mail</a>
      <div class="tile p-0">
        <h4 class="tile-title folder-head">Folders</h4>
        <div class="tile-body">
          <ul class="nav nav-pills flex-column mail-nav">
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-inbox fa-fw"></i> Inbox<span
                  class="badge badge-pill badge-primary float-right">12</span></a></li>
            <li class="nav-item active"><a class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> Sent</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-file-text-o fa-fw"></i> Drafts</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-filter fa-fw"></i> Junk <span
                  class="badge badge-pill badge-primary float-right">8</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-trash-o fa-fw"></i> Trash</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tile">
        <div class="mailbox-controls  d-flex justify-content-end">

          <!-- <div class="btn-group">
            <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-trash-o"></i></button>
            <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-reply"></i></button>
            <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-share"></i></button>
            <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-refresh"></i></button>
          </div> -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table id="example1" datatable="ng" class="table table-hover">
            <thead>
              <tr>
                <th>
                  <div class="animated-checkbox">
                    <label>
                      <input type="checkbox"><span class="label-text"></span>
                    </label>
                  </div>
                </th>
                <th>Penerima</th>
                <th>Perihal</th>
                <th>Berkas</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in datas.suratkeluar | filter: tipe:'Penerima'">
                <td>
                  <div class="animated-checkbox">
                    <label>
                      <input type="checkbox"><span class="label-text"> </span>
                    </label>
                  </div>
                </td>
                <td>{{item.namapenerima}}</td>
                <td>{{item.perihal}}</td>
                <td class="text-center"><a href="{{url}}/assets/berkas/{{item.berkas}}" target="_blank"><i class="fa fa-paperclip"></i></a></td>
                <td>{{item.tanggal}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    <div id="sidebar_secondary" class="asidebox">
      <div class="popup-head">
        <div class="popup-head-left pull-left">
          <a title="Tulis Pesan" target="_blank" href="https://web.facebook.com/iamgurdeeposahan">
            <h1>Tulis Pesan</h1>
          </a>
        </div>
        <div class="popup-head-right pull-right">
          <button data-widget="remove" id="removeClass" class="chat-header-button pull-right btn-danger"
            type="button"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <div class="popup-body">
        <div class="row">
          <div class="col-md-12"  style="height: 750px; overflow-y:auto">
            <form class="form-horizontal" ng-submit="simpan()">
              <div class="form-group row">
                <label class="control-label col-md-3">Jenis</label>
                <div class="col-md-8">
                  <select class="form-control justselect" ng-options="item as item for item in jenis"
                    ng-model="itemjenis" ng-change="selectjenis(itemjenis); show = true">
                  </select>
                </div>
              </div>
              <div class="form-group row" ng-show="show">
                <label class="control-label col-md-3">Penerima</label>
                <div class="col-md-8" ng-show="itemjenis==='Pegawai'">
                  <select class="form-control select22" ng-options="item as item.nm_struktural for item in penerimas"
                    ng-model="penerima" ng-change="selectpenerima(penerima)">
                    <option></option>
                  </select>
                </div>
                <div class="col-md-8" ng-show="itemjenis==='Mahasiswa'">
                  <select class="form-control select22"  multiple="multiple" ng-options="item as item.nmmhs for item in penerimas"
                    ng-model="penerima" ng-change="selectpenerima(penerima)">
                    <option></option>
                  </select>
                </div>
                <div class="col-md-8" ng-show="itemjenis==='Eksternal'">
                  <select class="form-control select22" ng-options="item as item.nmmhs for item in eksternals"
                    ng-model="eksternal" ng-change="selectpenerima(eksternal)">
                    <option></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Tembusan</label>
                <div class="col-md-8">
                <select class="form-control select2" multiple="multiple" ng-options="item as item.nm_struktural for item in tembusans"
                    ng-model="tembusan" ng-change="selecttembusan(tembusan)">
                    <option></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">No Surat</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" placeholder="No Surat" ng-model="model.nomorsurat">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Perihal</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" placeholder="Perihal" ng-model="model.perihal">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Kategori Surat</label>
                <div class="col-md-8">
                  <select class="form-control select2" ng-options="item as item.nama_kategori for item in datas.kategorisurat"
                    ng-model="kategori" ng-change="model.idkategori_surat=kategori.idkategori_surat">
                    <option></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">File Berkas</label>
                <div class="col-md-8">
                  <input type="file" class="form-control-file text-secondary font-weight-bold" id="inputFile" file-model = "myFile" accept="application/pdf" data-title="{{fileTitle}}">
                </div>
              </div>
              <div class="form-group row pull-right">
                <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <button class="btn btn-info">Testing</button>
      </div>

    </div>
</div>