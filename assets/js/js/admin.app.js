angular
	.module('admin.app', [ 'admin.services', 'admin.controller', 'helper.service', 'datatables', 'rt.select2' ])
	.directive('fileModel', function($parse) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.bind('change', function() {
					$parse(attrs.fileModel).assign(scope, element[0].files);
					scope.$apply();
				});
			}
		};
	})
	.directive('tooltip', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.hover(
					function() {
						// on mouseenter
						element.tooltip('show');
					},
					function() {
						// on mouseleave
						element.tooltip('hide');
					}
				);
			}
		};
	});
