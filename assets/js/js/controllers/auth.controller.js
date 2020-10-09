(function() {
	'use strict';

	angular.module('auth.controller', []).controller('AuthController', AuthController);

	function AuthController($scope, AuthService, $window, helperServices) {
		$scope.model = {};
		$scope.back = () => {
			$window.history.back();
		};
		$scope.login = () => {
			AuthService.post($scope.model).then((x) => {
				if (x.message) {
					swal('Information!', x.message, 'error');
				} else {
					var data = x.role.find((role) => role.nm_struktural == 'Admin');
					if (data) window.location.href = helperServices.url + '/admin/dashboard';
					else window.location.href = helperServices.url + '/dashboard';
				}
			});
		};
	}
})();
