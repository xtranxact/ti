
<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>Task :: Edit @{{ task.name }} </h2>
    </div>
</div>

<div class="wrapper wrapper-content animated">
    <div class="row">
        <div class="col-md-11"> 
        <div class="ibox float-e-margins">
            <h2>Basic Information</h2> <br/>

            <form class="form-horizontal" name="taskForm" novalidate>
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} " ng-class="{'has-error':taskForm.$submitted && taskForm.name.$invalid || taskForm.name.$touched && taskForm.name.$invalid} ">
                    <label class="control-label col-md-3">task Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" ng-model = "task.name" required>
                        <div class="help-block m-b-none" ng-show="taskForm.$submitted && taskForm.name.$invalid || taskForm.name.$touched">
                        <span ng-show = "taskForm.name.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.name">
                            <span ng-show = "errors.name">@{{ errors.name.toString() }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }} " ng-class="{'has-error':taskForm.$submitted && taskForm.code.$invalid || taskForm.code.$touched && taskForm.code.$invalid}">
                    <label class="control-label col-md-3">Task Code</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name = "code" ng-model = "task.code" required>
                        <div class="help-block m-b-none" ng-show="taskForm.$submitted && taskForm.code.$invalid || taskForm.code.$touched">
                            <span ng-show = "taskForm.code.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.code">
                            <span ng-show = "errors.code">@{{ errors.code.toString() }}</span>
                        </div>
                    </div>
                </div>


                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} " ng-class="{'has-error':taskForm.$submitted && taskForm.status.$invalid || taskForm.status.$touched && taskForm.status.$invalid}">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name = "status" ng-model="task.status" required >
                            <option value="" selected="selected">choose one?</option>
                            <option value=1>Active</option>
                            <option value=0>In-Active</option>
                        </select>
                        <div class="help-block m-b-none" ng-show="taskForm.$submitted && taskForm.status.$invalid || taskForm.status.$touched">
                            <span ng-show = "taskForm.status.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.status">
                            <span ng-show = "errors.status">@{{ errors.status.toString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <button ng-click = "saveTask(taskForm.$valid)" type="submit" class="btn square btn-primary" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Update This Record</button> 
                    <button type="button" ng-click="closeModal()" class="btn square btn-default" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Cancel</button> 
                    </div>      
                </div>
            </form>
        </div>
    </div>
</div>
</div>



