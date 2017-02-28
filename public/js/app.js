'use strict';
(function(){
	angular.module('timer',['ngResource','ngSanitize', 'ui.bootstrap',
		'angular-ladda','ui.router', 'oitozero.ngSweetAlert',
		'datatables', 'datatables.buttons','datatables.select',
		'toaster', 'ngAnimate' ,]).constant('APP_URL', '/timer/');
})();