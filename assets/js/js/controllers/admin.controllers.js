(function () {
    "use strict";

    angular.module('admin.controller', [])
        .controller('AdminController', AdminController)
        .controller('HomeController', HomeController)
        .controller('StrukturController', StrukturController)
        .controller('KriteriaController', KriteriaController);

    function AdminController($scope, helperServices) {
        $scope.url = helperServices.url;
        $scope.title = "Sistem Surat";
        $scope.active = "Home";
        $scope.dashboard = "Dashboard";
        $scope.header = helperServices.url + "/assets/template/header.php"
        $scope.menu = helperServices.url + "/assets/template/menu.php"
        $scope.$on("Title", function (evt, data) {
            $scope.title += ' | ' + data.title;
            $scope.dashboard = data.title;
            $scope.active = data.active;
        });
    }

    function HomeController($scope) {
        $scope.title = {title:"Dashboard", active: "Home"};
        $scope.$emit("Title", $scope.title);
    }

    function StrukturController($scope, StrukturService) {
        $scope.datas = [];
        $scope.model = {};
        $scope.title = {title:"Struktural", active: "Struktural"};
        $scope.$emit("Title", $scope.title);
        StrukturService.get().then(x => {
            $scope.datas = x;
        })
        $scope.simpan = () => {
            swal({
                title: "Confirm!!",
                text: "Anda yakin akan melanjutkan proses?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        StrukturService.post($scope.model).then(x=>{
                            swal("Success", {
                                icon: "success",
                            });
                            $scope.model = {};
                        })
                        
                    } else {
                        swal("Proses Dibatalkan", {
                            icon: "error"
                        });
                    }
                });
        }
        $scope.hapus = (item)=>{
            swal({
                title: "Confirm",
                text: "Anda yakin akan melanjutkan proses?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        StrukturService.delete(item.idstruktural).then(x=>{
                            swal("Success", {
                                icon: "success",
                            });
                        })
                        
                    } else {
                        swal("Proses Dibatalkan", {
                            icon: "error"
                        });
                    }
                });
        }
        $scope.edit = (item)=>{
            $scope.model = item;
        }
    }

    function KriteriaController($scope, StrukturService) {
        $scope.datas = [];
        $scope.model = {};
        $scope.title = {title:"Kriteria", active: "Kriteria"};
        $scope.$emit("Title", $scope.title);
        StrukturService.get().then(x => {
            $scope.datas = x;
        })
        $scope.simpan = () => {
            swal({
                title: "Confirm!!",
                text: "Anda yakin akan melanjutkan proses?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        StrukturService.post($scope.model).then(x=>{
                            swal("Success", {
                                icon: "success",
                            });
                            $scope.model = {};
                        })
                        
                    } else {
                        swal("Proses Dibatalkan", {
                            icon: "error"
                        });
                    }
                });
        }
        $scope.hapus = (item)=>{
            swal({
                title: "Confirm",
                text: "Anda yakin akan melanjutkan proses?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        StrukturService.delete(item.idstruktural).then(x=>{
                            swal("Success", {
                                icon: "success",
                            });
                        })
                        
                    } else {
                        swal("Proses Dibatalkan", {
                            icon: "error"
                        });
                    }
                });
        }
        $scope.edit = (item)=>{
            $scope.model = item;
        }
    }



})();
