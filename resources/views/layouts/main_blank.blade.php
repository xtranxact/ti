<!DOCTYPE html>
<html ng-app = "timer">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="{{ URL('public/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL('public/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ URL('public/css/app/animate.css') }}" rel="stylesheet" >

        <link href="{!! asset('public/css/toastr/toastr.min.css') !!}" rel="stylesheet">
        <link href="{{ URL('public/css/ladda-themeless.min.css') }}" rel="stylesheet"> 
        <link href="{{ URL('public/css/app/style_app.css') }}" rel="stylesheet" >
    
        <script type="text/javascript" src="{{ URL('public/plugins/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/jquery-ui/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/angular.min.js') }}"></script>
 
    
        <title>Time Billing | Online Timesheet, Expense Management at its Best</title>
        <meta name="description" content="Time Billing, Expense sheet, time tracking, time sheet management">
</head>
<body class="gray-bg" landing-scrollspy id="page-top" style=" ">
<toaster-container toaster-options="{'position-class':'toast-top-right','close-button':true,'body-output-type':'trustedHtml','showDuration':'200','hideDuration':'100'}">
</toaster-container>

<div id="wrapper" class="top-navigation">
    <div id="page-wrapper" style="min-height: 1200px">
        @yield('content')
        <div class="footer" >
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