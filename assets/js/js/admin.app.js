angular.module('admin.app', [
    'admin.services',
    'admin.controller',
    'helper.service',
    'datatables',
    'rt.select2'
])
.directive('tooltip', function(){
    return {
        restrict: 'A',
        link: function(scope, element, attrs){
            element.hover(function(){
                // on mouseenter
                element.tooltip('show');
            }, function(){
                // on mouseleave
                element.tooltip('hide');
            });
        }
    };
});

