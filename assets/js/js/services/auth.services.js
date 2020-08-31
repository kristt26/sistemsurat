(function () {
    "use strict";
    angular.module('auth.services', [])
        .factory('AuthService', AuthService);

    function AuthService($http, $q, helperServices) {
        var url = helperServices.url + '/auth/';
        var service = { Items: [] };
        
        service.post = function (param) {
            var def = $q.defer();
            $http({
                method: 'POST',
                url: url + 'login',
                headers: {
                    'Content-Type': 'application/json'
                },
                data: param
            }).then(
                (response) => {
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
