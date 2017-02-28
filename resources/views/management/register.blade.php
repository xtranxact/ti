@extends('layouts.preliminary')
@section('content')
            <section class="light-gray-bg  clearfix" ng-controller = "ClientCtrl" style=" background-color: #ffffff">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 col-md-offset-2">
                            <div class=" feature-box" >
                            <div class="text-center">
                            <p>
                                <h1 style="text-transform: none;color:#34ad58"><b>Sign Up</b></h1>
                            </p>
                                <p>
                                   <h2> In 60 Seconds, You’ll be Using ClickTime</h2>

                                   <h4>Online timesheets, powerful reports, and world-class support — free for 30 days. You won't pay anything. No credit card required! </h4>
                                </p></div>
                                <div class="separator clearfix"></div>
                                <form role="form" name = "CompanyForm" ng-submit ="CompanyForm.$valid && register(CompanyForm.$valid)" novalidate>
                                {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback {{ $errors->has('firstname') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.firstname.$invalid || CompanyForm.firstname.$touched && CompanyForm.firstname.$invalid} ">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control input-lg" name="firstname" ng-model = "company.firstname" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.firstname.$invalid || CompanyForm.firstname.$touched">
                                    <span ng-show = "CompanyForm.firstname.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.firstname">
                                        <span ng-show = "errors.firstname">@{{ errors.firstname.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  has-feedback {{ $errors->has('lastname') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.lastname.$invalid || CompanyForm.lastname.$touched && CompanyForm.lastname.$invalid}">
                                    <label class="control-label" for="inputWarning3">Last Name</label>
                                    <input type="text" class="form-control input-lg" name = "lastname" ng-model = "company.lastname" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.lastname.$invalid || CompanyForm.lastname.$touched">
                                        <span ng-show = "CompanyForm.lastname.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.lastname">
                                        <span ng-show = "errors.lastname">@{{ errors.lastname.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group has-feedback {{ $errors->has('phone_number') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.phone_number.$invalid || CompanyForm.phone_number.$touched && CompanyForm.phone_number.$invalid}">
                                    <label class="control-label">Phone</label>
                                    <input type="text" class="form-control input-lg" name="phone_number" ng-model = "company.phone_number" required>
                                    <i class="fa fa-phone_number form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.phone_number.$invalid || CompanyForm.phone_number.$touched">
                                        <span ng-show = "CompanyForm.phone_number.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.phone_number">
                                        <span ng-show = "errors.phone_number">@{{ errors.phone_number.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group has-feedback {{ $errors->has('company_name') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.company_name.$invalid || CompanyForm.company_name.$touched && CompanyForm.company_name.$invalid}">
                                    <label class="control-label">Company Name</label>
                                    <input type="text" class="form-control input-lg" name="company_name" ng-model = "company.company_name" required>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.company_name.$invalid || CompanyForm.company_name.$touched">
                                        <span ng-show = "CompanyForm.company_name.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.company_name">
                                        <span ng-show = "errors.company_name">@{{ errors.company_name.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback {{ $errors->has('staff_strength_id') ? ' has-error' : '' }} " ng-class="{'has-error':CompanyForm.$submitted && CompanyForm.staff_strength_id.$invalid || CompanyForm.staff_strength_id.$touched && CompanyForm.staff_strength_id.$invalid}">
                                    <label class="control-label">Staff Strength</label>
                                    <select class="form-control" name = "staff_strength_id" ng-model="company.staff_strength_id" required style="padding: 2px;height: 53px;border-radius: 0px;font-size: 18px">
                                        <option value="" selected="selected">What is your staff strength ?</option>
                                        <option value="1 - 10" >1 - 10</option>
                                        <option value="11 - 20" >11 - 20</option>
                                        <option value="21 - 50" >21 - 50</option>
                                        <option value="1 - 10" >51 - 100</option>
                                        <option value="101 - 1000" >101 - 1000</option>
                                        <option value="100plus" >1000 and Above</option>
                                    </select>
                                    <div class="help-block m-b-none" ng-show="CompanyForm.$submitted && CompanyForm.staff_strength_id.$invalid || CompanyForm.staff_strength_id.$touched">
                                        <span ng-show = "CompanyForm.staff_strength_id.$error.required">This field is required</span>
                                    </div>
                                    <div class="help-block m-b-none" ng-show="errors.staff_strength_id">
                                        <span ng-show = "errors.staff_strength_id">@{{ errors.staff_strength_id.toString() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn square btn-success btn-block btn-xl" ladda="ladda" data-style="expand-right" ng-disabled="isProcessing">Start Your Free TimeBill Trial</button>
                            </div>        
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection


   