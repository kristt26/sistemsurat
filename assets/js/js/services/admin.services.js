(function () {
    "use strict";

    angular.module('admin.services', [])
        .factory('HomeService', HomeService)
        .factory('StrukturService', StrukturService);

    function HomeService() {

    }

    function StrukturService($http, $q, helperServices) {
        var url = helperServices.url + '/admin/struktural/';
        var service = { Items: [] };

        service.get = function () {
            var def = $q.defer();
            if (service.instance) {
                def.resolve(service.Items);
            } else {
                $http({
                    method: 'Get',
                    url: url + 'getdata',
                    headers: {
                        'Content-Type': 'application/json'
                    },
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

        service.post = function (param) {
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
                    swal("Information!", err.data, "error");
                    def.reject(err);
                }
            );
            return def.promise;
        };

        service.delete = function (id) {
            var def = $q.defer();
            $http({
                method: 'Delete',
                url: url + 'remove/' + id,
                headers: {
                    'Content-Type': 'application/json'
                },
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
                    swal("Information!", err.data, "error");
                    def.reject(err);
                }
            );
            return def.promise;
        };
        return service;
    }

})();
