@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>Tasks :: New</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{URL('tasks')}}">Tasks</a>
            </li>
            <li class="active">
                <strong>New task</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-5"><br/><br/>
       <a class="btn square btn-default pull-right" href="{{URL('tasks')}}" ng-disabled="isProcessing">Cancel Opearation</a> 
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="TaskCtrl">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"> 
        <div class="ibox float-e-margins">
        <div class="ibox-content" style="border: 0px">
        <p>
            <h2>Basic Information</h2> <hr/><br/>
        </p>
            <form class="form-horizontal" name="taskForm" ng-submit="taskForm.$valid && savetask(taskForm.$valid)" novalidate>
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} " ng-class="{'has-error':taskForm.$submitted && taskForm.name.$invalid || taskForm.name.$touched && taskForm.name.$invalid} ">
                    <label class="control-label col-md-3">Task Name</label>
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
                            <option value="0" >In-Active</option>
                            <option value="1" >Active</option>
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
                    <button ng-click = "saveTask(taskForm.$valid, true)" type="submit" class="btn square btn-primary" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Save</button> 
                    <button ng-click = "saveTask(taskForm.$valid, false)" type="submit" class="btn square btn-primary" ladda="ladda2" data-style="expand-right" ng-disabled="isProcessing2">Save and Add Next</button> 

                    </div>      
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>


@endsection

