angular
    .module('timer')
    .service('DBService', function($http, $q) {
        
        Array.prototype.keySort = function(key,desc){
            this.sort(function(a,b){
                var result = desc ? (a[key]< b[key]) : (a[key] > b[key]);
                return result ? 1 : -1;
            }); return this;
        }

    var deferObject,
        myMethods = {
            //Create a db object on server
            save: function(model, saveurl) {
                var promise = $http({
                    method:"POST",
                    url: saveurl,
                    data: $.param(model),
                    headers: {'Content-Type':'application/x-www-form-urlencoded'}
                }), deferObject = deferObject || $q.defer();
                promise.then(function(req){
                deferObject.resolve(req); }, function(reason) {
                    deferObject.reject(reason);
                });
                return deferObject.promise;
            },
            fetchAll: function(geturl) {
                var promise = $http({
                    method:"GET",
                    url: geturl
                }), deferObject = deferObject || $q.defer();
                promise.then(function(req){
                deferObject.resolve(req); }, function(reason) {
                    deferObject.reject(reason);
                });
                return deferObject.promise;
            },
            //Get a db object by id
            delete: function(id,url){
                var promise =  $http({
                    method:"POST",url:url,
                    data:$.param({id:id}),
                    headers: {'Content-Type':'application/x-www-form-urlencoded'}
                }), deferObject = deferObject || $q.defer();
                promise.then(function(req){
                deferObject.resolve(req); }, function(reason) {
                    deferObject.reject(reason);
                });
                return deferObject.promise;
            },
            removeListItem: function(modellist,id){
                for(var i=0;i<modellist.length;i++){
                    if(modellist[i].id == id) { modellist.splice(i,1); }
                }
            },
            //Get a list of db objects with query
            refreshList: function(modellist, data){
                modellist.push(data);
                modellist.keySort('id',true);
            },
            signin: function(model,url){
                var promise =  $http({
                    method:"POST",url:url,
                    data:$.param(model),
                    headers: {'Content-Type':'application/x-www-form-urlencoded'}
                }), deferObject = deferObject || $q.defer();
                promise.then(function(req){
                deferObject.resolve(req); }, function(reason) {
                    deferObject.reject(reason);
                });
                return deferObject.promise;
            },
        }
        return myMethods;

})

.service('httpReponseInterceptor' , function(APP_URL, $q, $window)
{
    return {
        "responseError": function(rejection){
            if(rejection.status == 401){
                $window.location = APP_URL + 'sign-in';
            }
            return $q.reject(rejection);
        }
    };
});