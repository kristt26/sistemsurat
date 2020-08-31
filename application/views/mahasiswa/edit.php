<div class="row col-md-12" ng-controller="DetailMahasiswaController">
	<div class="col-md-12">
		<div class="card">
			<div class="profilecard d-flex justify-content-between">
				<h5 class="card-title" style="color: white">Detail Profile</h5>
				<button class="btn btn-secondary btn-sm" ng-click = "back()"><i class="fa fa-arrow-left"></i> Kembali</button>
			</div>
			<div class="profilecard-body">
				<div class="row col-md-12">
					<div class="col-md-4">

						<div class="card">
							<div class="card-header text-center">
								<h5 class="card-title">Detail Perkuliahan</h5>
							</div>
							<div class="card-body">
								<div class="app-sidebar__user">
									<img class="app-sidebar__user-avatar avatar-profile" ng-src="{{photo}}"
										alt="User Image" style="width:200px; height: 200px">
									
								</div>
								<p class="text-center title-profile"><strong>{{datas.nmmhs}}</strong></p>
								<p class="text-center titlesecond-profile">{{datas.npm}}</p>
								<hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> IPK</p>
									<p>{{detail.IPK}}</p>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Jurusan</p>
									<p>{{detail.nmps}}</p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Jenjang</p>
									<p>{{detail.jenjang}}</p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Semester</p>
									<p>{{detail.semester}}</p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Kelas</p>
									<p>{{detail.kelas}}</p>
								</div><hr>
								
								
								
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card" style="margin-bottom: 10px">
							<div class="card-header text-center">
								<h5 class="card-title">Info Umum</h5>
							</div>
							<div class="card-body">
								<div class="row col-md-12">
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Alamat <br>{{datas.almt}}, Kode Pos: {{datas.kdps}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Agama <br>{{datas.agama}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Tempat Lahir <br>{{datas.tmlhr}}</p>
										<hr>
									</div>
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Jenis Kelamin <br>{{datas.jk}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Kewarnegaraan <br>{{datas.kewarga}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Tanggal Lahir <br>{{datas.tglhr}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> No. Telepon <br>{{datas.notlp}}</p>
										<hr>
									</div>
								</div>
							</div>
							
						</div>
						<div class="card" style="margin-bottom: 10px">
							<div class="card-header text-center">
								<h5 class="card-title">Info Orang Tua</h5>
							</div>
							<div class="card-body">
								<div class="row col-md-12">
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Nama Ayah <br>{{datas.nmayah}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Alamat Ayah <br>{{datas.almtayah}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Pekerjaan <br>{{datas.pekerjaan}}</p>
										<hr>
									</div>
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Nama Ibu <br>{{datas.nmibu}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Sumber Biaya <br>{{datas.sumbiaya}}</p>
										<hr>
									</div>
								</div>
							</div>
							
						</div>
						<div class="card" style="margin-bottom: 10px">
							<div class="card-header text-center">
								<h5 class="card-title">Info Sekolah</h5>
							</div>
							<div class="card-body">
								<div class="row col-md-12">
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Pendidikan Terakhir<br>{{datas.pendidikan}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Asal Sekolah <br>{{datas.nmsmu}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Kota <br>{{datas.kotasmu}}</p>
										<hr>
									</div>
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Jurusan <br>{{datas.jursmu}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Provinsi <br>{{datas.provsmu}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Kabupaten <br>{{datas.kabsmu}}</p>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>