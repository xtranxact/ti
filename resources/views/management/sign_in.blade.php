@extends('layouts.preliminary')
@section('content')
            <section class="light-gray-bg  clearfix" ng-controller = "ClientCtrl" style=" background-color: #ffffff">
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 col-md-offset-4">
                            <div class=" feature-box" >
                            <div class="">
                                <p>
                                    <h1 style="text-transform: none;color:#34ad58"><b>Sign In</b></h1>
                                </p>
                            </div>
                                <div class="separator clearfix"></div>
                                <form role="form" name = "CompanyForm" ng-submit ="CompanyForm.$valid && signin()" novalidate>
                                {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.email.$invalid || CompanyForm.email.$touched && CompanyForm.email.$invalid || errors.email}">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control input-lg" name="email" ng-model = "company.email" required>
                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.email.$invalid || CompanyForm.email.$touched">
                                        <span ng-show = "CompanyForm.email.$error.required">This field is required</span>
                                        <span ng-show = "CompanyForm.email.$error.email">Please enter a valid email address</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.email">
                                        <span ng-show = "errors.email">@{{ errors.email.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.password.$invalid || CompanyForm.password.$touched && CompanyForm.password.$invalid}">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control input-lg" name="password" ng-model = "company.password" required>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.password.$invalid || CompanyForm.password.$touched">
                                        <span ng-show = "CompanyForm.password.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.password">
                                        <span ng-show = "errors.password">@{{ errors.password.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><a href="#"> Forgot your password </a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btn square btn-success btn-block btn-lg" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Sign In</button>
                            </div>        
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection
