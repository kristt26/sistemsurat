(function () {
	'use strict';

	angular
		.module('admin.controller', ['ui.bootstrap'])
		.controller('AdminController', AdminController)
		.controller('HomeController', HomeController)
		.controller('StrukturController', StrukturController)
		.controller('KriteriaController', KriteriaController)
		.controller('KategoriController', KategoriController)
		.controller('MahasiswaController', MahasiswaController)
		.controller('DetailMahasiswaController', DetailMahasiswaController)
		.controller('PegawaiController', PegawaiController)
		.controller('DetailPegawaiController', DetailPegawaiController)
		.controller('PejabatController', PejabatController)
		.controller('SuratController', SuratController);

	function AdminController($scope, helperServices, AuthService) {
		$scope.adminakses = false;
		$scope.session = {};
		$scope.url = helperServices.url;
		$scope.main = $scope.url + '/assets/js/main.js';
		$('.bs-component [data-toggle="tooltip"]').tooltip();
		$.LoadingOverlay('show', {
			background: 'rgba(0, 0, 0, 0.85)',
			image: $scope.url + '/assets/img/preloader.gif',
			imageResizeFactor: 2,
			imageAnimation: 'none'
		});
		$scope.title = 'Sistem Surat';
		$scope.active = 'Home';
		$scope.dashboard = 'Dashboard';
		AuthService.get().then(x => {
			$scope.session = x;
			$scope.photo = x.photo ? 'https://restsimak.stimiksepnop.ac.id/assets/file/photo/' + x.photo : $scope.url + '/assets/img/avatar.png';
			$scope.adminakses = x.nm_struktural == 'Admin' ? true : false;
		})
		$scope.header = helperServices.url + '/assets/template/header.php';
		$scope.menu = helperServices.url + '/assets/template/menu.php';
		$scope.$on('Title', function (evt, data) {
			$scope.title += ' | ' + data.title;
			$scope.dashboard = data.title;
			$scope.active = data.active;
		});
		$scope.detailpegawai = () => {
			window.location.href = $scope.url + "/admin/pegawai/detail/" + $scope.session.idpegawai;
		}
		$scope.logout = () => {
			window.location.href = $scope.url + '/auth/logout';
		}
	}

	function HomeController($scope, PegawaiService, helperServices, HomeService) {
		$scope.jenis = ['Struktural', 'Kategori'];
		$scope.totalSurat = 0;
		$scope.totalStruktur = 0;
		$scope.itemjenis = '';
		$scope.datas = [];
		$scope.title = { title: 'Dashboard', active: 'Home' };
		$scope.$emit('Title', $scope.title);
		PegawaiService.checkidtelegram().then(x => {
			if (!x.chatid) {
				swal({
					title: 'Information',
					text: 'Chat id telegram anda kosong, mohon mengisi chat id anda',
					icon: 'info',
					// buttons: true,
					// dangerMode: false
				}).then((willDelete) => {
					if (willDelete) {
						document.location.href = helperServices.url + "/admin/pegawai/detail/" + x.idpegawai;
					}
				});
			} else {
				HomeService.get().then(x => {
					$scope.datas = x;
					$scope.itemjenis = 'Struktural';
					$scope.totalStruktur = $scope.datas.struktural.reduce(function (prev, cur) {
						return prev + 1;
					}, 0);
					$scope.totalSurat = $scope.datas.struktural.reduce(function (prev, cur) {
						return prev + parseFloat(cur.suratkeluar);
					}, 0);
					$scope.showData();
				})
			}
			$.LoadingOverlay('hide');
		});
		$scope.showData = () => {
			if ($scope.itemjenis == "Struktural") {
				var labels = [];
				var data = [];
				var jenis = ['Surat Masuk', 'Surat Keluar', 'Tembusan'];
				var msgTotal = $scope.datas.struktural.reduce(function (prev, cur) {
					return prev + parseFloat(cur.suratkeluar);
				}, 0);
				jenis.forEach(itemjenis => {
					var itemset = {};
					itemset.label = itemjenis;
					if (itemjenis == 'Surat Masuk') {
						itemset.backgroundColor = random_rgba(1)[0];
						itemset.data = [];
						$scope.datas.struktural.forEach(itemstruktur => {
							itemset.data.push(parseFloat(itemstruktur.suratmasuk)/msgTotal*100);
						});
					} else if (itemjenis == 'Surat Keluar') {
						itemset.backgroundColor = random_rgba(1)[0];
						itemset.data = [];
						$scope.datas.struktural.forEach(itemstruktur => {
							itemset.data.push(parseFloat(itemstruktur.suratkeluar)/msgTotal*100);
						});
					} else {
						itemset.backgroundColor = random_rgba(1)[0];
						itemset.data = [];
						$scope.datas.struktural.forEach(itemstruktur => {
							itemset.data.push(parseFloat(itemstruktur.surattembusan)/msgTotal*100);
						});
					}
					data.push(angular.copy(itemset));
				});
				$scope.datas.struktural.forEach(itemstruktur => {
					labels.push(itemstruktur.nm_struktural);
				});
				console.log(data);
				console.log(labels);
				$scope.grafik(labels, data, $scope.itemjenis);
			} else {
				var labels = [];
				var data = [];
				var jenis = [];
				var backgroundColor = random_rgba($scope.datas.kategori.length);
				var msgTotal = $scope.datas.kategori.reduce(function (prev, cur) {
					return prev + parseFloat(cur.total);
				}, 0);
				$scope.datas.kategori.forEach(element => {
					labels.push(element.nama_kategori);
					data.push(parseFloat(element.total) / msgTotal * 100)
					backgroundColor = random_rgba(1)
					var itemset = {};
					itemset.backgroundColor = random_rgba(1)[0];
					itemset.label = element.nama_kategori;

				});

				console.log(data);
				console.log(labels);
				$scope.grafik1(labels, data, $scope.itemjenis, backgroundColor);
			}


		}
		var random_rgba = (length) => {
			var color = [];
			for (let index = 0; index < length; index++) {
				var o = Math.round,
					r = Math.random,
					s = 255;
				color.push('rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + 0.7 + ')');
			}
			// console.log(color);
			return color;
		};
		$scope.grafik1 = (labels, dataset, jenis, color) => {
			$scope.dataPrint = [];
			$('#myChart').remove(); // this is my <canvas> element
			$('.card-body').append(
				'<canvas id="myChart"class="chartjs" width="770" height="385"style="display: block; width: 100%; height: 385px;"><canvas>'
			);
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: 'Presentase',
						data: dataset,
						backgroundColor: color,
						borderWidth: 1
					}]
				},
				options: {
					title: {
						display: true,
						text: 'GRAFIK PRESENTASE SURAT BERDASARKAN ' + jenis.toUpperCase(),
						font: {
							size: 20
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						position: 'top'
					},
					scales: {
						xAxes: [
							{
								display: true,
								scaleLabel: {
									display: true,
									labelString: jenis
								}
							}
						],
						yAxes: [
							{
								ticks: {
									beginAtZero: true
								},
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Presentase (%)'
								}
							}
						]
					}
				}
			});
		};
		$scope.grafik = (labels, dataset, jenis) => {
			$scope.dataPrint = [];
			$('#myChart').remove(); // this is my <canvas> element
			$('.card-body').append(
				'<canvas id="myChart"class="chartjs" width="770" height="385"style="display: block; width: 100%; height: 385px;"><canvas>'
			);
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: dataset
				},
				options: {
					title: {
						display: true,
						text: 'GRAFIK PRESENTASE SURAT BERDASARKAN ' + jenis.toUpperCase(),
						font: {
							size: 20
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						position: 'top'
					},
					scales: {
						xAxes: [
							{
								display: true,
								scaleLabel: {
									display: true,
									labelString: jenis
								}
							}
						],
						yAxes: [
							{
								ticks: {
									beginAtZero: true
								},
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Presentase (%)'
								}
							}
						]
					}
				}
			});
			for (let itemlayanan = 0; itemlayanan < labels.length; itemlayanan++) {
				var items = {};
				items.aspek = labels[itemlayanan];
				items.data = [];
				$scope.dataPrint.push(angular.copy(items));
			}
			for (let index = 0; index < dataset.length; index++) {
				for (let index1 = 0; index1 < dataset[index].data.length; index1++) {
					$scope.dataPrint[index1].data.push(dataset[index].data[index1]);
				}
			}
		};
	}

	function StrukturController($scope, StrukturService) {
		$scope.datas = [];
		$scope.model = {};
		$scope.title = { title: 'Struktural', active: 'Struktural' };
		$scope.$emit('Title', $scope.title);
		StrukturService.get().then((x) => {
			$scope.datas = x;
			$.LoadingOverlay('hide');
		});
		$scope.simpan = () => {
			swal({
				title: 'Confirm!!',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'info',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					StrukturService.post($scope.model).then((x) => {
						swal('Success', {
							icon: 'success'
						});
						$scope.model = {};
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.hapus = (item) => {
			swal({
				title: 'Confirm',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					StrukturService.delete(item.idstruktural).then((x) => {
						swal('Success', {
							icon: 'success'
						});
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.edit = (item) => {
			$scope.model = item;
		};
	}

	function KriteriaController($scope, KriteriaService, helperServices) {
		$scope.datas = [];
		$scope.model = {};
		$scope.title = { title: 'Kriteria', active: 'Kriteria' };
		$scope.$emit('Title', $scope.title);
		KriteriaService.get().then((x) => {
			$scope.datas = x;
			$.LoadingOverlay('hide');
		});
		$scope.simpan = () => {
			swal({
				title: 'Confirm!!',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					KriteriaService.post($scope.model).then((x) => {
						swal('Success', {
							icon: 'success'
						});
						$scope.model = {};
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.hapus = (item) => {
			swal({
				title: 'Confirm',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					KriteriaService.delete(item.idkriteria).then((x) => {
						swal('Success', {
							icon: 'success'
						});
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.edit = (item) => {
			$scope.model = angular.copy(item);
		};
		$scope.addkategori = (item) => {
			window.location.href = helperServices.url + '/admin/kategorisurat/index/' + item.idkriteria;
		};
	}

	function KategoriController($scope, KategoriService, $window) {
		$scope.datas = [];
		$scope.model = {};
		$scope.title = { title: 'Kategori', active: 'Kategori' };
		$scope.$emit('Title', $scope.title);
		KategoriService.get().then((x) => {
			$scope.datas = x;
			$.LoadingOverlay('hide');
		});
		$scope.simpan = () => {
			swal({
				title: 'Confirm!!',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					$scope.model.idkriteria = angular.copy($scope.datas.kriterium.idkriteria);
					KategoriService.post($scope.model).then((x) => {
						swal('Success', {
							icon: 'success'
						});
						$scope.model = {};
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.hapus = (item) => {
			swal({
				title: 'Confirm',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					KategoriService.delete(item.idkategori_surat).then((x) => {
						swal('Success', {
							icon: 'success'
						});
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.edit = (item) => {
			$scope.model = angular.copy(item);
		};
		$scope.back = () => {
			$window.history.back();
		};
	}

	function MahasiswaController($scope, MahasiswaService, helperServices) {
		$scope.datas = [];
		$scope.model = {};
		$scope.title = { title: 'Mahasiswa', active: 'Mahasiswa' };
		$scope.$emit('Title', $scope.title);
		MahasiswaService.get().then((x) => {
			$scope.datas = x;
			$.LoadingOverlay('hide');
		});
		$scope.detail = (item) => {
			window.location.href = helperServices.url + '/admin/mahasiswa/detail/' + item.Id;
		};
	}

	function DetailMahasiswaController($scope, MahasiswaService, $window, helperServices) {
		$scope.datas;
		$scope.detail;
		$scope.model = {};
		$scope.photo = helperServices.url + '/assets/img/avatar.png';
		$scope.title = { title: 'Detail Mahasiswa', active: 'Detail Mahasiswa' };
		$scope.$emit('Title', $scope.title);
		MahasiswaService.getone().then((x) => {
			$scope.datas = x;
			if ($scope.datas.photo)
				$scope.photo = 'https://restsimak.stimiksepnop.ac.id/assets/file/photo/' + $scope.datas.photo;
			MahasiswaService.getdetailmhs($scope.datas.npm).then((mhs) => {
				$scope.detail = mhs;
				$.LoadingOverlay('hide');
			});
		});
		$scope.back = () => {
			$window.history.back();
		};
	}

	function PegawaiController($scope, PegawaiService, helperServices) {
		$scope.datas = [];
		$scope.model = {};
		$scope.title = { title: 'Pegawai', active: 'Pegawai' };
		$scope.$emit('Title', $scope.title);
		PegawaiService.get().then((x) => {
			$scope.datas = x;
			$.LoadingOverlay('hide');
		});
		$scope.detail = (item) => {
			window.location.href = helperServices.url + '/admin/pegawai/detail/' + item.idpegawai;
		};
	}

	function DetailPegawaiController($scope, PegawaiService, $window, helperServices) {
		$scope.datas;
		$scope.detail;
		$scope.model = {};
		$scope.photo = helperServices.url + '/assets/img/avatar.png';
		$scope.title = { title: 'Detail Pegawai', active: 'Detail Pegawai' };
		$scope.$emit('Title', $scope.title);
		PegawaiService.getone().then((x) => {
			$scope.datas = x;
			if ($scope.datas.photo)
				$scope.photo = 'https://restsimak.stimiksepnop.ac.id/assets/file/photo/' + $scope.datas.photo;
			$.LoadingOverlay('hide');
		});
		$scope.back = () => {
			$window.history.back();
		};
		$scope.updatetelegram = (item) => {
			PegawaiService.updatetelegram(item).then(x => {
				swal('Success', {
					icon: 'success'
				});
			})
		}
	}

	function PejabatController($scope, PejabatService, $window, StrukturService, PegawaiService) {
		$('.js-example-basic-single').select2();
		$scope.datas = [];
		$scope.pegawais = [];
		$scope.pegawai = {};
		$scope.struktural = {};
		$scope.strukturals = [];
		$scope.model = {};
		$scope.title = { title: 'Pejabat', active: 'Pejabat' };
		$scope.$emit('Title', $scope.title);
		PejabatService.get().then((x) => {
			$scope.datas = x;
			StrukturService.get().then((struktur) => {
				$scope.strukturals = struktur;
				PegawaiService.get().then((pegawai) => {
					$scope.pegawais = pegawai;
					$.LoadingOverlay('hide');
				});
			});
		});
		$scope.simpan = () => {
			swal({
				title: 'Confirm!!',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					PejabatService.post($scope.model).then((x) => {
						swal('Success', {
							icon: 'success'
						});
						$scope.model = {};
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.hapus = (item) => {
			swal({
				title: 'Confirm',
				text: 'Anda yakin akan melanjutkan proses?',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					PejabatService.delete(item.idpejabat).then((x) => {
						swal('Success', {
							icon: 'success'
						});
					});
				} else {
					swal('Proses Dibatalkan', {
						icon: 'error'
					});
				}
			});
		};
		$scope.edit = (item) => {
			$scope.model = angular.copy(item);
			$scope.pegawai = $scope.pegawais.find((x) => x.idpegawai == item.idpegawai);
			$scope.struktural = $scope.strukturals.find((x) => x.idstruktural == item.idstruktural);
		};
		$scope.back = () => {
			$window.history.back();
		};
	}

	function SuratController($scope, SuratService, helperServices) {
		$scope.url = helperServices.url;
		$scope.jenis = helperServices.jenis;
		$scope.datas = [];
		$scope.model = {};
		$scope.penerima = {};
		$scope.penerimas = [];
		$scope.tembusans = [];
		$scope.tembusan = [];
		$scope.show = false;
		$scope.title = { title: 'Kotak Surat', active: 'Kotak Surat' };
		$scope.$emit('Title', $scope.title);
		$scope.itemjenis;
		$scope.navmailbox = 'inbox';
		SuratService.get().then((x) => {
			$scope.datas = x;
			// $scope.penerimas = angular.copy($scope.datas.pegawai);
			$.LoadingOverlay('hide');
		});
		$scope.selectpenerima = (item) => {
			$scope.model.idpengguna = item.idpengguna;
			$scope.tembusans = angular.copy($scope.datas.pegawai);
			$scope.tembusan = [];
			var data = $scope.tembusans.find((x) => x.idpengguna == item.idpengguna);
			if (data) {
				var index = $scope.tembusans.indexOf(data);
				$scope.tembusans.splice(index, 1);
				console.log($scope.tembusans);
			}
		};
		$scope.selecttembusan = (item) => {
			console.log(item);
		};
		$scope.simpan = () => {
			$.LoadingOverlay('show', {
				background: 'rgba(0, 0, 0, 0.85)',
				image: $scope.url + '/assets/img/preloader.gif',
				imageResizeFactor: 2,
				imageAnimation: 'none'
			});
			var fd = new FormData();
			if ($scope.myFile) {
				var file = $scope.myFile;
				fd.append('file', file[0]);
			}
			$scope.model.penerima = $scope.penerima;
			$scope.model.tembusan = $scope.tembusan;
			SuratService.upload(fd).then((file) => {
				$scope.model.berkas = file.file;
				$scope.model.tembusan = $scope.tembusan;
				SuratService.post($scope.model).then((x) => {
					$scope.datas = x;
					$scope.model = {};
					$scope.penerimas = [];
					$scope.tembusans = [];
					$scope.tembusan = [];
					console.log(x);
					$.LoadingOverlay('hide');
					$('.asidebox').css('height', 0);
					$('.asidebox').css('width', 0);
					swal('Information!', "Proses berhasil", 'success');
				});
			});
		};
		$scope.selectjenis = (item) => {
			if (item == 'Pegawai') {
				$scope.penerimas = angular.copy($scope.datas.pegawai);
			} else if (item == 'Mahasiswa') {
				$scope.penerimas = angular.copy($scope.datas.mahasiswa);
			} else {
				$scope.penerimas = angular.copy($scope.datas.eksternal);
			}
		}
		$scope.setnav = (item) => {
			$scope.navmailbox = item;
		}
	}
})();
