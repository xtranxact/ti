
function config($stateProvider, $httpProvider,$sceProvider)
{

  $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
  $httpProvider.interceptors.push('httpReponseInterceptor');

}

angular
    .module('timer')
    .config(config)
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
  });
