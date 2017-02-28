@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>Jobs :: Create New</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{URL('dashboard')}}">Dashboard</a>
            </li>
            <li class="active">
                <strong>New job</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-5"><br/><br/>
       <a class="btn square btn-default pull-right" href="{{URL('jobs')}}" ng-disabled="isProcessing">Cancel Opearation</a> 
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="JobCtrl">
    <div class="row">
    <form class="form-horizontal" name="jobForm" ng-submit="jobForm.$valid && saveJob(jobForm.$valid)" novalidate>
        <div class="col-md-7 col-md-offset-3"> 
            <div class="ibox float-e-margins">
            <div class="ibox-content" style="border: 0px">
            <p>
                <h2>Basic Information</h2> 
            </p>
            <div class="ibox-content ibox-heading">

                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('client_id') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.client_id.$invalid || jobForm.client_id.$touched && jobForm.client_id.$invalid} ">
                        <label class="control-label col-md-3">Client</label>
                        <div class="col-md-9">
                            <select class="form-control" name="client_id" ng-model = "job.client_id" required>
                                <option value="">Choose one?</option>
                                @foreach($clients as $c)
                                <option value="{{$c['id']}}">{{$c['name']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.client_id.$invalid || jobForm.client_id.$touched">
                            <span ng-show = "jobForm.client_id.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.client_id">
                                <span ng-show = "errors.client_id">@{{ errors.client_id.toString() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.name.$invalid || jobForm.name.$touched && jobForm.name.$invalid} ">
                        <label class="control-label col-md-3">Job Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" ng-model = "job.name" required>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.name.$invalid || jobForm.name.$touched">
                            <span ng-show = "jobForm.name.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.name">
                                <span ng-show = "errors.name">@{{ errors.name.toString() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('number') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.number.$invalid || jobForm.number.$touched && jobForm.number.$invalid}">
                        <label class="control-label col-md-3">Job Number</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name = "number" ng-model = "job.number" required>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.number.$invalid || jobForm.number.$touched">
                                <span ng-show = "jobForm.number.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.number">
                                <span ng-show = "errors.number">@{{ errors.number.toString() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Estimated Time</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-sm" name="estimated_time" ng-model = "job.estimated_time" required>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('billable') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.billable.$invalid || jobForm.billable.$touched && jobForm.billable.$invalid}">
                        <label class="control-label col-md-3">Billable ?</label>
                        <div class="col-md-6">
                            <select class="form-control" name = "billable" ng-model="job.billable" required >
                                <option value="" selected="selected">choose one?</option>
                                <option value="0" >Non_Billable</option>
                                <option value="1" >Billable</option>
                            </select>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.billable.$invalid || jobForm.billable.$touched">
                                <span ng-show = "jobForm.billable.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.billable">
                                <span ng-show = "errors.billable">@{{ errors.billable.toString() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.status.$invalid || jobForm.status.$touched && jobForm.status.$invalid}">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-6">
                            <select class="form-control" name = "status" ng-model="job.status" required >
                                <option value="" selected="selected">choose one?</option>
                                <option value="0" >In-Active</option>
                                <option value="1" >Active</option>
                            </select>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.status.$invalid || jobForm.status.$touched">
                                <span ng-show = "jobForm.status.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.status">
                                <span ng-show = "errors.status">@{{ errors.status.toString() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.note.$invalid || jobForm.note.$touched && jobForm.note.$invalid}">
                        <label class="control-label col-md-3">Note</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-lg" name="note" ng-model = "job.note" required>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.note.$invalid || jobForm.note.$touched">
                                <span ng-show = "jobForm.note.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.note">
                                <span ng-show = "errors.note">@{{ errors.note.toString() }}</span>
                            </div>
                        </div>
                    </div>
            </div>
                
            <p> <br/>
            <h2>Job Manager</h2> 
            </p>
            <div class="ibox-content ibox-heading"  >
                <div class="form-group has-feedback {{ $errors->has('manager') ? ' has-error' : '' }} " ng-class="{'has-error':jobForm.$submitted && jobForm.manager.$invalid || jobForm.manager.$touched && jobForm.manager.$invalid}">
                        <label class="control-label col-md-3">job Manager</label>
                        <div class="col-md-9">
                            <select class="form-control" name = "manager" ng-model="job.manager" required >
                                <option value="" selected="selected">Choose one?</option>
                                @foreach($managers as $m)
                                    <option value="{{$m->id}}">{{ $m->firstname .' ' . $m->lastname }}</option>
                                @endforeach
                            </select>
                            <div class="help-block m-b-none" ng-show="jobForm.$submitted && jobForm.manager.$invalid || jobForm.manager.$touched">
                                <span ng-show = "jobForm.manager.$error.required">This field is required</span>
                            </div>
                            <div class="help-block m-b-none" ng-show="errors.manager">
                                <span ng-show = "errors.manager">@{{ errors.manager.toString() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <button ng-click = "saveJob(jobForm.$valid, true)" type="submit" class="btn btn-lg btn-primary" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing" style="padding-right: 50px; padding-left: 50px">Save</button> 
                    <button ng-click = "saveJob(jobForm.$valid, false)" type="submit" class="btn btn-lg square btn-primary" ladda="ladda2" data-style="expand-right" ng-disabled="isProcessing2">Save and Add Next</button>      
                </div> 
                </div>
                </div>
            </div>
          
 
    </form>
</div>
</div>


@endsection

