@extends('layouts.main_blank')
@section('content')

<div class="middle-box text-center loginscreen  animated fadeInDown" ng-controller = "ClientCtrl">
    <div>

        <h2 class="text-green"><b>Hi</b>, {{$name}}</h2>
        <p>
            Your request to create an account was successful.
        </p>
        <p>You have been designated as the Administrator.</p>
        <form class="m-t" role ="form" name = "CompanyForm" ng-submit ="CompanyForm.$valid && verify_email()" >
        <label>Please enter Password sent to {{ $email }} </label>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.password.$invalid || CompanyForm.password.$touched && CompanyForm.password.$invalid} ">
                <input type="password" class="form-control" name="password" placeholder="Password" ng-model = "company.password" required>
                <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.password.$invalid || CompanyForm.password.$touched">
                	<span ng-show = "CompanyForm.password.$error.required">This field is required</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" ladda="isProcessing" data-style="expand-right" ng-disabled="isProcessing">Continue to My Account</button>
        </form>
        <p class="m-t"> <small>&copy; 2016 - <?php echo date('Y') ?></small> </p>
    </div>
</div>

@endsection