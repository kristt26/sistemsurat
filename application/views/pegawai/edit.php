<div class="row col-md-12" ng-controller="DetailPegawaiController">
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
								<p class="text-center title-profile"><strong>{{datas.Nama}}</strong></p>
								<p class="text-center titlesecond-profile">{{datas.NIK}}</p>
								<hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Jabatan</p>
									<p>{{datas.nm_struktural}}</p>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Tahun Masuk</p>
									<p><strong>{{datas.TahunMasuk}}</strong></p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> No SK</p>
									<p><strong>{{datas.NoSK}}</strong></p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Status</p>
									<p><strong>{{datas.Status}}</strong></p>
								</div><hr>
								<div class="d-flex justify-content-between">
									<p><span class="fa fa-map-marker"></span> Id Chat Telegram</p>
									<p class="d-flex justify-content-between"><strong><input type="text" class="form-control" ng-model="datas.chatid" ng-focus="true"></strong><button class="btn btn-primary btn-sm" ng-click="updatetelegram(datas)">Update</button></p>
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
										<p><span class="fa fa-map-marker"></span> Alamat <br>{{datas.Alamat}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Tempat Lahir <br>{{datas.TempatLahir}}</p>
										<hr>
									</div>
									<div class="col-md-6">
										<p><span class="fa fa-map-marker"></span> Kontak <br>{{datas.Kontak}}</p>
										<hr>
										<p><span class="fa fa-map-marker"></span> Tanggal Lahir <br>{{datas.TanggalLahir}}</p>
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
