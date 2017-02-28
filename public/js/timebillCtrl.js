
function ClientCtrl($http, DBService, $window, APP_URL,$scope,toaster,SweetAlert) {
	$scope.company = {};
	$scope.errors = {};
	$scope.verified = null;
	$scope.ladda = $scope.isProcessing = false;

	$scope.register = function(valid){
		if(valid){
		$scope.ladda = $scope.isProcessing = true;
		 var p = DBService.save($scope.company, APP_URL + 'register');
		 	p.then(function(res){
		 		if(res.data.success){
		 			$window.location =  APP_URL + res.data.url;
		 		}else if(res.data.invalid && res.data.errors){
		 			toaster.error(res.data.msg);
		 			$scope.errors = res.data.errors;
		 		}else{
		 			toaster.error(res.data.msg);
		 		}
		 		$scope.ladda = $scope.isProcessing = false;
		 	},function(){});
		}
	}

	$scope.verify_email = function(){
		$scope.ladda = $scope.isProcessing = true;
		 var p = DBService.save($scope.company, APP_URL + 'register/verify-email');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = false;
		 		if(res.data.success){
		 			$window.location =  APP_URL + res.data.url;
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
	}

	$scope.signin = function(){
		$scope.ladda = $scope.isProcessing = true;
		 var p = DBService.signin($scope.company, APP_URL + 'sign-in');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = false;
		 		if(res.data.success){
		 			$window.location =  APP_URL + res.data.redirectUrl;
		 		}		
		 	},function(res){ 
		 		toaster.error(res.data.msg);
		 		$scope.ladda = $scope.isProcessing = false; 
		 	 });
	}
}

function CompanyCtrl($http,DBService,$uibModal,$window,$compile,APP_URL,$resource,$scope,toaster,SweetAlert,DTColumnBuilder,DTColumnDefBuilder,DTOptionsBuilder){
	$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
	$scope.clients = {};
	$scope.client ={};

	$scope.dtColumns = [
        DTColumnBuilder.newColumn('name').withTitle('Client Name'),
        DTColumnBuilder.newColumn('short_name').withTitle('Client Name Code'),
        DTColumnBuilder.newColumn('manager').withTitle('Designated Manager'),
        DTColumnBuilder.newColumn('status').withTitle('Status'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable().renderWith(actionHtml) ];
        function actionHtml(data,type,full,mata){
            $scope.clients[data.id] = data;
            return "<a class = 'label label-md label-danger' ng-click = 'deleteClient(" + data.id + ")'>Delete</a> <a class = 'label label-md label-primary' ng-click = 'editClient(" + data.id + ")'>Edit</a> <a class = 'label label-md label-default' ng-click = 'viewClient(" + data.id + ")'>View</a>";
        }

    $scope.dtOptions = DTOptionsBuilder.fromSource(APP_URL+"clients?table=table")
        .withPaginationType("full_numbers").withOption('processing', true).withOption('deferRender', true)
        .withOption('autoWidth',false).withOption('bLengthChange', true)
        .withOption('fnRowCallback', function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
            $compile(nRow)($scope)
        });

    $scope.nested = {};
    $scope.nested.dtInstance = {};

	$scope.editClient = function(id){
		$http.get(APP_URL+'clients/'+id+'?getsingle=client').then(function(res){
			console.log(res.data);
            $scope.showModal(res.data);
        }); 
	}

	$scope.deleteClient = function(id){
		var confirm = $window.confirm("Are you sure you want to delete client " + $scope.clients[id].name);	
		if(confirm){
			var p = DBService.delete(id, APP_URL + 'clients?delete=delete');
		 	p.then(function(res){
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "clients";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
		
	}

	$scope.viewClient = function(id){
        $window.location = APP_URL+'clients/'+id+'?details=EntityDetails'; 
	}

	$scope.saveClient = function(valid,v){
		if(valid){
			if(v==true){
				$scope.ladda = $scope.isProcessing = true;
				$scope.isProcessing2 = true;
			}else{
				$scope.ladda2 = $scope.isProcessing2 = true;
				$scope.isProcessing = true;
			}
		 var p = DBService.save($scope.client, APP_URL + 'clients?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
		 			$scope.client = {};
		 			$scope.clientEForm.$setPristine();
                    $scope.clientEForm.$setUntouched();
                    if(v==true){
                    	$window.location = APP_URL + "clients";
                    }
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}

    $scope.showModal = function(data){
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'clients?edit=edit', 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:clientModelInstance,
                resolve:{
                client: function(){
                    return data;
                },
               }         
            }).result.then(function(){
               // $scope.nested.dtInstance.reloadData();
        }, function(){
           // $scope.nested.dtInstance.reloadData();
        }); 
    }
}

function TaskCtrl($http,DBService,$uibModal,$window,$compile,APP_URL,$resource,$scope,toaster,SweetAlert,DTColumnBuilder,DTColumnDefBuilder,DTOptionsBuilder){
	$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
	$scope.tasks = {};
	$scope.task ={};

	$scope.dtColumns = [
        DTColumnBuilder.newColumn('name').withTitle('Task Name'),
        DTColumnBuilder.newColumn('code').withTitle('Task Name Code'),
        DTColumnBuilder.newColumn('preview').withTitle('Display on Time Entry'),
        DTColumnBuilder.newColumn('status').withTitle('Status'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable().renderWith(actionHtml) ];
        function actionHtml(data,type,full,mata){
            $scope.tasks[data.id] = data;
            return "<a class = 'label label-md label-danger' ng-click = 'deleteTask(" + data.id + ")'>Delete</a> <a class = 'label label-md label-primary' ng-click = 'editTask(" + data.id + ")'>Edit</a> <a class = 'label label-md label-default' ng-click = 'viewTask(" + data.id + ")'>View</a>";
        }
    $scope.dtOptions = DTOptionsBuilder.fromSource(APP_URL+"tasks?table=table")
        .withPaginationType("full_numbers").withOption('processing', true).withOption('deferRender', true)
        .withOption('autoWidth',false).withOption('bLengthChange', true)
        .withOption('fnRowCallback', function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
            $compile(nRow)($scope)
        });

    $scope.nested = {};
    $scope.nested.dtInstance = {};

	$scope.editTask = function(id){
		$http.get(APP_URL+'tasks/'+id+'?getsingle=task').then(function(res){
            $scope.showTaskModal(res.data);
        }); 
	}

	$scope.deleteTask = function(id){
		var confirm = $window.confirm("Are you sure you want to delete task " + $scope.tasks[id].name);
		if(confirm){
			var p = DBService.delete(id, APP_URL + 'tasks?delete=delete');
		 	p.then(function(res){
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "tasks";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}	 
	}

	$scope.viewTask = function(id){
        $window.location = APP_URL+'tasks/'+id+'?details=EntityDetails'; 
	}

	$scope.saveTask = function(valid,v){
		if(valid){
			if(v==true){
				$scope.ladda = $scope.isProcessing = true;
				$scope.isProcessing2 = true;
			}else{
				$scope.ladda2 = $scope.isProcessing2 = true;
				$scope.isProcessing = true;
			}
		 var p = DBService.save($scope.task, APP_URL + 'tasks?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
		 			$scope.client = {};
		 			$scope.taskForm.$setPristine();
                    $scope.taskForm.$setUntouched();
                    if(v==true){
                    	$window.location = APP_URL + "tasks";
                    }
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}

    $scope.showTaskModal = function(data){
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'tasks?edit=edit', 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:taskModelInstance,
                resolve:{
                task: function(){
                    return data;
                },
               }         
            }).result.then(function(){
               // $scope.nested.dtInstance.reloadData();
        }, function(){
           // $scope.nested.dtInstance.reloadData();
        }); 
    }
}

function JobCtrl($http,DBService,$uibModal,$window,$compile,APP_URL,$resource,$scope,toaster,SweetAlert,DTColumnBuilder,DTColumnDefBuilder,DTOptionsBuilder){
	$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
	$scope.jobs = {};
	$scope.job ={};

	$scope.dtColumns = [
        DTColumnBuilder.newColumn('name').withTitle('Job Name'),
        DTColumnBuilder.newColumn('number').withTitle('Job Number'),
        DTColumnBuilder.newColumn('preview').withTitle('Display on Time Entry'),
        DTColumnBuilder.newColumn('billable').withTitle('Billable'),
        DTColumnBuilder.newColumn('status').withTitle('Status'),
        DTColumnBuilder.newColumn('manager').withTitle('Manager'),
        DTColumnBuilder.newColumn('estimated_time').withTitle('Estimated Time (Hrs)'),
        
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable().renderWith(actionHtml) ];
        function actionHtml(data,type,full,mata){
            $scope.jobs[data.id] = data;
            return "<a class = 'label label-md label-danger' ng-click = 'deleteJob(" + data.id + ")'>Delete</a> <a class = 'label label-md label-primary' ng-click = 'editJob(" + data.id + ")'>Edit</a> <a class = 'label label-md label-default' ng-click = 'viewJob(" + data.id + ")'>View</a>";
        }
    $scope.dtOptions = DTOptionsBuilder.fromSource(APP_URL+"jobs?table=table")
        .withPaginationType("full_numbers").withOption('processing', true).withOption('deferRender', true)
        .withOption('autoWidth',false).withOption('bLengthChange', true)
        .withOption('fnRowCallback', function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
            $compile(nRow)($scope)
        });

    $scope.nested = {};
    $scope.nested.dtInstance = {};

	$scope.editJob = function(id){
		$http.get(APP_URL+'jobs/'+id+'?getsingle=job').then(function(res){
            $scope.showJobModal(res.data);
        }); 
	}

	$scope.deleteJob = function(id){
		var confirm = $window.confirm("Are you sure you want to delete task " + $scope.jobs[id].name);
		if(confirm){
			var p = DBService.delete(id, APP_URL + 'jobs?delete=delete');
		 	p.then(function(res){
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "jobs";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}	 
	}

	$scope.viewJob = function(id){
        $window.location = APP_URL+'jobs/'+id+'?details=EntityDetails'; 
	}

	$scope.saveJob = function(valid,v){
		if(valid){
			if(v==true){
				$scope.ladda = $scope.isProcessing = true;
				$scope.isProcessing2 = true; $scope.ladda2=false;
			}else{
				$scope.ladda2 = $scope.isProcessing2 = true;
				$scope.isProcessing = true; $scope.ladda =false;
			}
		 var p = DBService.save($scope.job, APP_URL + 'jobs?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = $scope.ladda2 = $scope.isProcessing2 = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
		 			$scope.job = {};
		 			$scope.jobForm.$setPristine();
                    $scope.jobForm.$setUntouched();
                    if(v==true){
                    	$window.location = APP_URL + "jobs";
                    }
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}

    $scope.showJobModal = function(data){
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'jobs?edit=edit', 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:jobModelInstance,
                resolve:{
                job: function(){
                    return data;
                },
               }         
            }).result.then(function(){
               // $scope.nested.dtInstance.reloadData();
        }, function(){
           // $scope.nested.dtInstance.reloadData();
        }); 
    }
}

function clientModelInstance(client,$window,APP_URL,$scope,$http,toaster,$httpParamSerializerJQLike,$uibModalInstance,DBService){
	$scope.client = client;
	$scope.client.status = ""+client.status+"";
	$scope.client.manager = ""+client.manager+"";

	$scope.closeModal = function(){
        $uibModalInstance.dismiss('cancel');
    }
    
    $scope.saveClient = function(valid){	
		if(valid){
		$scope.ladda = $scope.isProcessing = true;
		var p = DBService.save($scope.client, APP_URL + 'clients?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "clients";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}
}

function taskModelInstance(task,$window,APP_URL,$scope,$http,toaster,$httpParamSerializerJQLike,$uibModalInstance,DBService){
	$scope.task = task;
	$scope.task.status = ""+task.status+"";

	$scope.closeModal = function(){
        $uibModalInstance.dismiss('cancel');
    }
    
    $scope.saveTask = function(valid){	
		if(valid){
		$scope.ladda = $scope.isProcessing = true;
		var p = DBService.save($scope.task, APP_URL + 'tasks?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "tasks";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}
}

function jobModelInstance(job,$window,APP_URL,$scope,$http,toaster,$httpParamSerializerJQLike,$uibModalInstance,DBService){
	$scope.job = job;
	$scope.job.status = ""+job.status+"";
	$scope.job.billable = "" + job.billable+ "";
	$scope.job.manager = "" + job.manager+ "";
	$scope.job.client_id = "" + job.client_id + "";

	$scope.closeModal = function(){
        $uibModalInstance.dismiss('cancel');
    }
    
    $scope.saveJob = function(valid){	
		if(valid){
		$scope.ladda = $scope.isProcessing = true;
		var p = DBService.save($scope.job, APP_URL + 'jobs?save=save');
		 	p.then(function(res){
		 		$scope.ladda = $scope.isProcessing = false;
		 		if(res.data.success){
		 			toaster.success(res.data.msg);
                    $window.location = APP_URL + "jobs";
		 		}else{
		 			toaster.error(res.data.msg);
		 		}		
		 	},function(){});
		}
	}
}

angular
    .module('timer')
    .controller('ClientCtrl', ClientCtrl)
    .controller('CompanyCtrl', CompanyCtrl)
    .controller('TaskCtrl',TaskCtrl)
    .controller('JobCtrl',JobCtrl)
    .controller('jobModelInstance',jobModelInstance)
    .controller('clientModelInstance',clientModelInstance)
    .controller('taskModelInstance',taskModelInstance)
    