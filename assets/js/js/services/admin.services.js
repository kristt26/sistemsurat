(function() {
	'use strict';

	angular
		.module('admin.services', [])
		.factory('HomeService', HomeService)
		.factory('StrukturService', StrukturService)
		.factory('KriteriaService', KriteriaService)
		.factory('KategoriService', KategoriService)
		.factory('MahasiswaService', MahasiswaService)
		.factory('PegawaiService', PegawaiService)
		.factory('PejabatService', PejabatService)
		.factory('SuratService', SuratService);

	function HomeService() {}

	function StrukturService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/struktural/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			if (service.instance) {
				def.resolve(service.Items);
			} else {
				$http({
					method: 'Get',
					url: url + 'getdata',
					headers: {
						'Content-Type': 'application/json'
					}
				}).then(
					(response) => {
						service.instance = true;
						service.Items = response.data;
						def.resolve(service.Items);
					},
					(err) => {
						message.error(err.data);
						def.reject(err);
					}
				);
			}
			return def.promise;
		};

		service.post = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'add',
				headers: {
					'Content-Type': 'application/json'
				},
				data: param
			}).then(
				(response) => {
					if (param.idstruktural) {
						var data = service.Items.find((x) => x.idstruktural == param.idstruktural);
						if (data) {
							data.nm_struktural = param.nm_struktural;
						}
					} else {
						service.Items.push(response.data);
					}

					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.delete = function(id) {
			var def = $q.defer();
			$http({
				method: 'Delete',
				url: url + 'remove/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					var data = service.Items.find((x) => x.idstruktural == id);
					if (data) {
						var index = service.Items.indexOf(data);
						service.Items.splice(index, 1);
						def.resolve(true);
					}
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};
		return service;
	}

	function KriteriaService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/kriterium/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			if (service.instance) {
				def.resolve(service.Items);
			} else {
				$http({
					method: 'Get',
					url: url + 'getdata',
					headers: {
						'Content-Type': 'application/json'
					}
				}).then(
					(response) => {
						service.instance = true;
						service.Items = response.data;
						def.resolve(service.Items);
					},
					(err) => {
						message.error(err.data);
						def.reject(err);
					}
				);
			}
			return def.promise;
		};

		service.post = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'add',
				headers: {
					'Content-Type': 'application/json'
				},
				data: param
			}).then(
				(response) => {
					if (param.idkriteria) {
						var data = service.Items.find((x) => x.idkriteria == param.idkriteria);
						if (data) {
							data.kriteria = param.kriteria;
						}
					} else {
						service.Items.push(response.data);
					}

					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.delete = function(id) {
			var def = $q.defer();
			$http({
				method: 'Delete',
				url: url + 'remove/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					var data = service.Items.find((x) => x.idkriteria == id);
					if (data) {
						var index = service.Items.indexOf(data);
						service.Items.splice(index, 1);
						def.resolve(true);
					}
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};
		return service;
	}

	function KategoriService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/kategorisurat/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			var id = helperServices.absUrl.split('/');
			id = id[id.length - 1];
			$http({
				method: 'Get',
				url: url + 'getdata/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.post = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'add',
				headers: {
					'Content-Type': 'application/json'
				},
				data: param
			}).then(
				(response) => {
					if (param.idkategori_surat) {
						var data = service.Items.kategorisurat.find(
							(x) => x.idkategori_surat == param.idkategori_surat
						);
						if (data) {
							data.nama_kategori = param.nama_kategori;
							data.keterangan = param.keterangan;
						}
					} else {
						service.Items.kategorisurat.push(response.data);
					}
					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.delete = function(id) {
			var def = $q.defer();
			$http({
				method: 'Delete',
				url: url + 'remove/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					var data = service.Items.kategorisurat.find((x) => x.idkategori_surat == id);
					if (data) {
						var index = service.Items.indexOf(data);
						service.Items.kategorisurat.splice(index, 1);
						def.resolve(true);
					}
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};
		return service;
	}

	function MahasiswaService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/mahasiswa/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			$http({
				method: 'Get',
				url: url + 'getdata',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.getone = function() {
			var def = $q.defer();
			var id = helperServices.absUrl.split('/');
			id = id[id.length - 1];
			$http({
				method: 'Get',
				url: url + 'getonedata/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};
		service.getdetailmhs = function(id) {
			var def = $q.defer();
			$http({
				method: 'Get',
				url: 'https://restsimak.stimiksepnop.ac.id/api/detailmahasiswa/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.detail = response.data;
					def.resolve(service.detail);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};

		return service;
	}

	function PegawaiService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/pegawai/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			$http({
				method: 'Get',
				url: url + 'getdata',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.getone = function() {
			var def = $q.defer();
			var id = helperServices.absUrl.split('/');
			id = id[id.length - 1];
			$http({
				method: 'Get',
				url: url + 'getonedata/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};
		service.getdetailmhs = function(id) {
			var def = $q.defer();
			$http({
				method: 'Get',
				url: 'https://restsimak.stimiksepnop.ac.id/api/detailmahasiswa/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.detail = response.data;
					def.resolve(service.detail);
				},
				(err) => {
					message.error(err.data);
					def.reject(err);
				}
			);
			return def.promise;
		};

		return service;
	}

	function PejabatService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/pejabat/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			$http({
				method: 'Get',
				url: url + 'getdata',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					$.LoadingOverlay('hide');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.post = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'add',
				headers: {
					'Content-Type': 'application/json'
				},
				data: param
			}).then(
				(response) => {
					if (param.idpejabat) {
						var data = service.Items.find((x) => x.idpejabat == param.idpejabat);
						if (data) {
							data.status = param.status;
						}
					} else {
						service.Items.push(response.data);
					}

					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.delete = function(id) {
			var def = $q.defer();
			$http({
				method: 'Delete',
				url: url + 'remove/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					var data = service.Items.find((x) => x.idpejabat == id);
					if (data) {
						var index = service.Items.indexOf(data);
						service.Items.splice(index, 1);
						def.resolve(true);
					}
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};
		return service;
	}

	function SuratService($http, $q, helperServices) {
		var url = helperServices.url + '/admin/surat/';
		var service = { Items: [] };

		service.get = function() {
			var def = $q.defer();
			if (service.instance) {
				def.resolve(service.Items);
			} else {
				$http({
					method: 'Get',
					url: url + 'getdata',
					headers: {
						'Content-Type': 'application/json'
					}
				}).then(
					(response) => {
						service.instance = true;
						service.Items = response.data;
						def.resolve(service.Items);
					},
					(err) => {
						swal('Information!', err.data, 'error');
						$.LoadingOverlay('hide');
						def.reject(err);
					}
				);
			}
			return def.promise;
		};

		service.post = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'add',
				headers: {
					'Content-Type': 'application/json'
				},
				data: param
			}).then(
				(response) => {
					service.Items = response.data;
					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					$.LoadingOverlay('hide');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.upload = function(param) {
			var def = $q.defer();
			$http({
				method: 'POST',
				url: url + 'upload',
				headers: {
					'Content-Type': undefined
				},
				data: param
			}).then(
				(response) => {
					def.resolve(response.data);
				},
				(err) => {
					swal('Information!', err.data, 'error');
					$.LoadingOverlay('hide');
					def.reject(err);
				}
			);
			return def.promise;
		};

		service.delete = function(id) {
			var def = $q.defer();
			$http({
				method: 'Delete',
				url: url + 'remove/' + id,
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					var data = service.Items.find((x) => x.idstruktural == id);
					if (data) {
						var index = service.Items.indexOf(data);
						service.Items.splice(index, 1);
						def.resolve(true);
					}
				},
				(err) => {
					swal('Information!', err.data, 'error');
					def.reject(err);
				}
			);
			return def.promise;
		};
		return service;
	}
})();
