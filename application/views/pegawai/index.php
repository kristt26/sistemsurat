<div class="row col-md-12" ng-controller="PegawaiController">
    <div class="col-md-12">
        <div class="tile">
            <div class="box-header">
                <h5 class="box-title">Data Pegawai</h5>
            	<hr>
            </div>
            <div class="box-body">
                <table id="example1" datatable="ng" class="table table-hover">
                    <thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Kontak</th>
							<th>TahunMasuk</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
                    <tbody>
						<tr ng-repeat="item in datas | orderBy: 'Nama'">
							<td>{{$index+1}}</td>
							<td>{{item.NIK}}</td>
							<td>{{item.Nama}}</td>
							<td>{{item.Alamat}}</td>
							<td>{{item.Kontak}}</td>
							<td>{{item.TahunMasuk}}</td>
							<td>{{item.Status}}</td>
							<td>
								<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Detail Pegawai" ng-click="detail(item)" tooltip><i class="fa fa-info"></i></button>
							</td>
						</tr>
					</tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
