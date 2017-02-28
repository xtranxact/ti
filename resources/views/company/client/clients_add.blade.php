@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>Clients :: New</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Client</a>
            </li>
            <li class="active">
                <strong>New Client</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-5"><br/><br/>
       <a class="btn square btn-default pull-right" href="{{URL('clients')}}" ng-disabled="isProcessing">Cancel Opearation</a> 
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="CompanyCtrl">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"> 
        <div class="ibox float-e-margins">
        <div class="ibox-content" style="border: 0px">
        <p>
            <h2>Basic Information</h2> <br/>
        </p>
            <form class="form-horizontal" name="clientEForm" ng-submit="clientEForm.$valid && saveClient(clientEForm.$valid)" novalidate>
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} " ng-class="{'has-error':clientEForm.$submitted && clientEForm.name.$invalid || clientEForm.name.$touched && clientEForm.name.$invalid} ">
                    <label class="control-label col-md-3">Client Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" ng-model = "client.name" required>
                        <div class="help-block m-b-none" ng-show="clientEForm.$submitted && clientEForm.name.$invalid || clientEForm.name.$touched">
                        <span ng-show = "clientEForm.name.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.name">
                            <span ng-show = "errors.name">@{{ errors.name.toString() }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('short_name') ? ' has-error' : '' }} " ng-class="{'has-error':clientEForm.$submitted && clientEForm.short_name.$invalid || clientEForm.short_name.$touched && clientEForm.short_name.$invalid}">
                    <label class="control-label col-md-3">Short Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name = "short_name" ng-model = "client.short_name" required>
                        <div class="help-block m-b-none" ng-show="clientEForm.$submitted && clientEForm.short_name.$invalid || clientEForm.short_name.$touched">
                            <span ng-show = "clientEForm.short_name.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.short_name">
                            <span ng-show = "errors.short_name">@{{ errors.short_name.toString() }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Client Number</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control input-sm" name="client_number" ng-model = "client.client_number" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} " ng-class="{'has-error':clientEForm.$submitted && clientEForm.status.$invalid || clientEForm.status.$touched && clientEForm.status.$invalid}">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name = "status" ng-model="client.status" required >
                            <option value="" selected="selected">choose one?</option>
                            <option value="0" >In-Active</option>
                            <option value="1" >Active</option>
                        </select>
                        <div class="help-block m-b-none" ng-show="clientEForm.$submitted && clientEForm.status.$invalid || clientEForm.status.$touched">
                            <span ng-show = "clientEForm.status.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.status">
                            <span ng-show = "errors.status">@{{ errors.status.toString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }} " ng-class="{'has-error':clientEForm.$submitted && clientEForm.note.$invalid || clientEForm.note.$touched && clientEForm.note.$invalid}">
                    <label class="control-label col-md-3">Note</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-lg" name="note" ng-model = "client.note" required>
                        <div class="help-block m-b-none" ng-show="clientEForm.$submitted && clientEForm.note.$invalid || clientEForm.note.$touched">
                            <span ng-show = "clientEForm.note.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.note">
                            <span ng-show = "errors.note">@{{ errors.note.toString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('manager') ? ' has-error' : '' }} " ng-class="{'has-error':clientEForm.$submitted && clientEForm.manager.$invalid || clientEForm.manager.$touched && clientEForm.manager.$invalid}">
                    <label class="control-label col-md-3">Client Manager</label>
                    <div class="col-md-9">
                        <select class="form-control" name = "manager" ng-model="client.manager" required >
                            <option value="" selected="selected">Choose one?</option>
                            @foreach($managers as $m)
                                <option value="{{$m->id}}">{{ $m->firstname .' ' . $m->lastname }}</option>
                            @endforeach
                        </select>
                        <div class="help-block m-b-none" ng-show="clientEForm.$submitted && clientEForm.manager.$invalid || clientEForm.manager.$touched">
                            <span ng-show = "clientEForm.manager.$error.required">This field is required</span>
                        </div>
                        <div class="help-block m-b-none" ng-show="errors.manager">
                            <span ng-show = "errors.manager">@{{ errors.manager.toString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <button ng-click = "saveClient(clientEForm.$valid, true)" type="submit" class="btn square btn-primary" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Save</button> 
                    <button ng-click = "saveClient(clientEForm.$valid, false)" type="submit" class="btn square btn-primary" ladda="ladda2" data-style="expand-right" ng-disabled="isProcessing2">Save and Add Next</button> 

                    </div>      
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>


@endsection

