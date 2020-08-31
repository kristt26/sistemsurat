<div class="row col-md-12" ng-controller="PejabatController">
    <div class="col-md-4">
        <div class="tile">
            <div class="box-header">
                <h3 class="box-title">Form Pejabat</h3>
            	<hr>
            </div>
            <div class="box-body">
                <form ng-submit="simpan()">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pejabat</label>
                        <select class="form-control select2" ng-options="item as item.Nama for item in pegawais" ng-model="pegawai" ng-change="model.idpegawai=pegawai.idpegawai">
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <select class="form-control select2" ng-options="item as item.nm_struktural for item in strukturals" ng-model="struktural" ng-change="model.idstruktural = struktural.idstruktural">
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. SK</label>
                        <input type="text" class="form-control" ng-model="model.NoSK" required placeholder="No SK Jabatan">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="tile">
            <div class="box-header">
                <h3 class="box-title">Data Pejabat</h3>
            	<hr>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>No</th>
						<th>Nama Pegawai</th>
						<th>Jabatan</th>
						<th>No SK Jabatan</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <tr ng-repeat="item in datas">
                        <td>{{$index+1}}</td>
                        <td>{{item.Nama}}</td>
						<td>{{item.nm_struktural}}</td>
						<td>{{item.NoSK}}</td>
						<td>{{item.status}}</td>
						<td>
                            <button type="button" class="btn btn-info btn-xs" ng-click="edit(item)"><i class="fa fa-pencil"></i></button> 
                            <button type="button" class="btn btn-danger btn-xs" ng-click="hapus(item)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
