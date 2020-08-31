<div class="row col-md-12" ng-controller="MahasiswaController">
    <div class="col-md-12">
        <div class="tile">
            <div class="box-header">
				<h5 class="box-title">Data Mahasiswa</h5>
				<hr>
            </div>
            <div class="box-body">
                <div style="width:100%">
					<table id="example1" datatable="ng" class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NPM</th>
								<th>Nama</th>
								<th>Jenjang</th>
								<th>Angkatan</th>
								<th>Kelas</th>
								<th>Jenis Kelamin</th>
								<th>Agama</th>
								<th>Kontak</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat = "item in datas">
								<td>{{$index+1}}</td>
								<td>{{item.npm}}</td>
								<td>{{item.nmmhs}}</td>
								<td>{{item.jenjang}}</td>
								<td>{{item.npm | limitTo: 4}}</td>
								<td>{{item.kelas}}</td>
								<td>{{item.jk}}</td>
								<td>{{item.agama}}</td>
								<td>{{item.notlp}}</td>
								<td>
									<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Detail Mahasiswa" data-original-title="" ng-click="detail(item)" tooltip><i class="fa fa-info"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>