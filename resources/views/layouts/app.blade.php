<!DOCTYPE html>
<html ng-app = "timer">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="{{ URL('public/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL('public/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ URL('public/css/app/animate.css') }}" rel="stylesheet" >
        <link href="{{ URL('public/css/dataTables/datatables.min.css') }}" rel="stylesheet">

        <link href="{!! asset('public/css/toastr/toastr.min.css') !!}" rel="stylesheet">
        <link href="{{ URL('public/css/ladda-themeless.min.css') }}" rel="stylesheet"> 
        <link href="{{ URL('public/css/app/style_app.css') }}" rel="stylesheet" >
    
        <script type="text/javascript" src="{{ URL('public/plugins/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/jquery-ui/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/angular.min.js') }}"></script>
 
    
        <title>Time Billing | Online Timesheet, Expense Management at its Best</title>
        <meta name="description" content="Time Billing, Expense sheet, time tracking, time sheet management">
        <style type="text/css">
            .help-block {
                display:none;
            }
            .computed-blocks {
                display:none;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.help-block').css({'display':'inline'});
                $('.computed-blocks').css({'display':'inline'}); 
            });
        </script>
</head>
<body class="white-bg" landing-scrollspy id="page-top" style=" ">
<toaster-container toaster-options="{'position-class':'toast-top-right','close-button':true,'body-output-type':'trustedHtml','showDuration':'200','hideDuration':'100'}">
</toaster-container>

<div id="wrapper" class="top-navigation">
    <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">TimeBilling <sub> V.2</sub></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL('tasks')}}">People</a></li>
                <li><a href="{{URL('clients')}}">Clients</a></li>
                <li><a href="{{URL('jobs')}}">Jobs</a></li>
                <li><a href="{{URL('tasks')}}">Tasks</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Company View</a></li>
                    <li><a href="#">Change Password</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div id="page-wrapper">
        @yield('content')
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2015-2016
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('.computed').css({'display':'block'});
    });
</script>

        <script src="{{asset('public/plugins/dataTables/datatables.min.js') }}"></script>
        <script src="{{asset('public/plugins/dataTables/angular-datatables.min.js') }}"></script>
        <script src="{{asset('public/plugins/dataTables/angular-datatables.buttons.min.js') }}"></script>
        <script src="{{asset('public/plugins/dataTables/angular-datatables.select.min.js') }}"></script>
        
        <script src="{{asset('public/js/angular/angular-animate.min.js') }}"></script>
        <script src="{{asset('public/js/angular/angular-switcher.min.js') }}"></script>
        <script src="{{asset('public/js/angular/angular-resource.min.js') }}"></script>
        <script src="{{asset('public/js/ui-router/angular-ui-router.min.js') }}"></script>
        <script src="{{asset('public/js/angular/angular-sanitize.min.js') }}"></script>
        <script src="{{asset('public/plugins/toastr/toastr.min.js') }}"></script>

        <script src="{{ asset('public/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('public/plugins/sweetalert/angular-sweetalert.min.js') }}"></script>

        <script src="{{ asset('public/plugins/ladda/spin.min.js') }}"></script>
        <script src="{{ asset('public/plugins/ladda/ladda.min.js') }}"></script>
        <script src="{{ asset('public/plugins/ladda/angular-ladda.min.js') }}"></script>

       <script src="{{asset('public/js/ui-bootstrap-tpls-1.1.2.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL('public/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/timebillCtrl.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/timebillDirectives.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/timeBillConfig.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/timebillServices.js') }}"></script>
</body>
</html>