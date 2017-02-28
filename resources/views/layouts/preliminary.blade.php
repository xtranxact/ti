<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

    
<!-- Mirrored from htmlcoder.me/preview/the_project/v.1.3/template/components-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Jan 2017 12:00:20 GMT -->
<head>
        <meta charset="utf-8">
        <title>Time Billing | Online Timesheet, Expense Management at its Best</title>
        <meta name="description" content="Time Billing, Expense sheet, time tracking, time sheet management">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="{{ URL('public/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="{{ URL('public/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

        <!-- Fontello CSS -->
        <link href="{{ URL('public/fonts/fontello/css/fontello.css') }}" rel="stylesheet">

        <!-- Plugins -->
        <link href="{{ URL('public/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ URL('public/css/animations.css') }}" rel="stylesheet">
        <link href="{{ URL('public/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ URL('public/plugins/owl-carousel/owl.transitions.css') }}" rel="stylesheet">
        <link href="{{ URL('public/plugins/hover/hover-min.css') }}" rel="stylesheet">    
        <link href="{{ URL('public/css/ladda-themeless.min.css') }}" rel="stylesheet">   
        <link href="{!! asset('public/css/toastr/toastr.min.css') !!}" rel="stylesheet">
        
        <!-- The Project's core CSS file -->
        <link href="{{ URL('public/css/style.css') }}" rel="stylesheet" >
        <!-- The Project's Typography CSS file, includes used fonts -->
        <!-- Used font for body: Roboto -->
        <!-- Used font for headings: Raleway -->
        <link href="{{ URL('public/css/typography-default.css') }}" rel="stylesheet" >

        <link href="{{ URL('public/css/skins/green.css') }}" rel="stylesheet">

        <script type="text/javascript" src="{{ URL('public/plugins/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/js/angular.min.js') }}"></script>

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

    <!-- body classes:  -->
    <!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
    <!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
    <!-- "transparent-header": makes the header transparent and pulls the banner to top -->
    <!-- "gradient-background-header": applies gradient background to header -->
    <!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
    <body class="no-trans" ng-app = "timer">
<toaster-container toaster-options="{'position-class':'toast-top-right','close-button':true,'body-output-type':'trustedHtml','showDuration':'200','hideDuration':'100'}">
</toaster-container>
        <!-- scrollToTop -->
        <!-- ================ -->
        <div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
        
        <!-- page wrapper start -->
        <!-- ================ -->
        <div class="page-wrapper">
        
            <!-- header-container start -->
            <div class="header-container">
                
                
                <!-- header-top start -->
                <!-- classes:  -->
                <!-- "dark": dark version of header top e.g. class="header-top dark" -->
                <!-- "colored": colored version of header top e.g. class="header-top colored" -->
                <!-- ================ -->
                <div class="header-top dark ">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-3 col-sm-6 col-md-9">
                                <!-- header-top-first start -->
                                <!-- ================ -->
                                <div class="header-top-first clearfix">
                                    <ul class="social-links circle small clearfix hidden-xs">
                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                        <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                        <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="youtube"><a target="_blank" href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
                                        <li class="flickr"><a target="_blank" href="http://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                        <li class="pinterest"><a target="_blank" href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                    <div class="social-links hidden-lg hidden-md hidden-sm circle small">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
                                            <ul class="dropdown-menu dropdown-animation">
                                                <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                                <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                                <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                                <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                                <li class="youtube"><a target="_blank" href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
                                                <li class="flickr"><a target="_blank" href="http://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
                                                <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                                <li class="pinterest"><a target="_blank" href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="list-inline hidden-sm hidden-xs">
                                        <li><i class="fa fa-map-marker pr-5 pl-10"></i>4B Keninde Odusite Anthony Village Lagos, Nigeria</li>
                                        <li><i class="fa fa-phone_number pr-5 pl-10"></i>+12 123 123 123</li>
                                        <li><i class="fa fa-envelope-o pr-5 pl-10"></i> timmebill@timebill.com</li>
                                    </ul>
                                </div>
                                <!-- header-top-first end -->
                            </div>
                            <div class="col-xs-9 col-sm-6 col-md-3">

                                <!-- header-top-second start -->
                                <!-- ================ -->
                                <div id="header-top-second"  class="clearfix">

                                    <!-- header top dropdowns start -->
                                    <!-- ================ -->
                                    <div class="header-top-dropdown text-right">
                                        <div class="btn-group">
                                            <a href="{{URL('register/signup')}}" class="btn btn-default btn-sm"><i class="fa fa-user pr-10"></i> Sign Up</a>
                                        </div>
                                        <div class="btn-group dropdown">
                                            <a class="btn btn-default btn-sm" href="{{URL('sign-in')}}"><i class="fa fa-lock pr-10"></i> Login</a>
                                        </div>
                                    </div>
                                    <!--  header top dropdowns end -->
                                </div>
                                <!-- header-top-second end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-top end -->
                
                <!-- header start -->
                <!-- classes:  -->
                <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
                <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
                <!-- "full-width": mandatory class for the full-width menu layout -->
                <!-- "centered": mandatory class for the centered logo layout -->
                <!-- ================ --> 
                <header class="header  fixed clearfix">   
                    <div class="container sub-padding">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- header-left start -->
                                <!-- ================ -->
                                <div class="header-left clearfix">  
                                    <!-- header dropdown buttons -->
                                    <div class="header-dropdown-buttons visible-xs">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                                <li>
                                                    <form role="search" class="search-box margin-clear">
                                                        <div class="form-group has-feedback">
                                                            <input type="text" class="form-control" placeholder="Search">
                                                            <i class="icon-search form-control-feedback"></i>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- header dropdown buttons end-->
                                    
                                    <!-- logo -->
                                    <div id="logo" class="logo">
                                        <a href="index.html">TimeBill</a>
                                    </div>

                                    <!-- name-and-slogan -->
                                    <div class="site-slogan">
                                        No. One time sheet software
                                    </div>
                                </div>
                                <!-- header-left end -->
                            </div>
                            <div class="col-md-9 ">
                                <!-- header-right start -->
                                <!-- ================ -->
                                <div class="header-right clearfix" >    
                                <div class="main-navigation  animated with-dropdown-buttons ">
                                    <!-- navbar start -->
                                    <!-- ================ -->
                                    <nav class="navbar navbar-default" role="navigation">
                                        <div class="container-fluid">
                                            <!-- Toggle get grouped for better mobile display -->
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>    
                                            </div>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                                <!-- main-menu -->
                                                <ul class="nav navbar-nav navbar-right ">
                                                    <li class="">
                                                        <a href="#" >Why TimeBill</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">Our Products</a>
                                                    </li>
                                                    <li class="">
                                                        <a  href="#">About</a>
                                                    </li>
                                                    <!-- mega-menu end -->
                                                </ul>
                                                <!-- main-menu end -->
                                            </div>
                                        </div>
                                    </nav>
                                    <!-- navbar end -->
                                </div>
                                <!-- main-navigation end -->
                                </div>
                                <!-- header-right end -->
                            </div>
                        </div>
                    </div>          
                </header>
                <!-- header end -->
            </div>


            @yield('content')


                     <!-- section end -->
            <div class="space"></div>
            <!-- section start -->
            <!-- ================ -->


            <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
            <!-- ================ -->
            <footer id="footer" class="clearfix dark">

                <!-- .footer start -->
                <!-- ================ -->
                <div class="footer">
                    <div class="container">
                        <div class="footer-inner">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="footer-content">
                                        <div class="logo-footer">
                                            
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Ipsa, aut voluptas quaerat... <a href="page-about.html">Learn More<i class="fa fa-long-arrow-right pl-5"></i></a></p>
                                        <div class="separator-2"></div>
                                        <nav>
                                            <ul class="nav nav-pills nav-stacked">
                                                <li><a target="_blank" href="http://htmlcoder.me/support">Support</a></li>
                                                <li><a href="#">Privacy</a></li>
                                                <li><a href="#">Terms</a></li>
                                                <li><a href="page-about.html">About</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="footer-content">
                                        <h2 class="title">Find Us</h2>
                                        <div class="separator-2"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium odio voluptatem necessitatibus illo vel dolorum soluta.</p>
                                        <ul class="social-links circle animated-effect-1">
                                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                            <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                            <li class="xing"><a target="_blank" href="http://www.xing.com/"><i class="fa fa-xing"></i></a></li>
                                        </ul>
                                        <div class="separator-2"></div>
                                        <ul class="list-icons">
                                            <li><i class="fa fa-map-marker pr-10 text-default"></i> One infinity loop, 54100</li>
                                            <li><i class="fa fa-phone_number pr-10 text-default"></i> +00 1234567890</li>
                                            <li><a href="mailto:info@theproject.com"><i class="fa fa-envelope-o pr-10"></i>info@theproject.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .footer end -->

                <!-- .subfooter start -->
                <!-- ================ -->
                <div class="subfooter">
                    <div class="container">
                        <div class="subfooter-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">Copyright © 2016 The Project by <a target="_blank" href="http://htmlcoder.me/">HtmlCoder</a>. All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .subfooter end -->

            </footer>
            <!-- footer end -->
            
        </div>
        <!-- page-wrapper end -->

        <!-- JavaScript files placed at the end of the document so the pages load faster -->
        <!-- ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        
        <script type="text/javascript" src="{{ URL('public/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- Modernizr javascript -->
        <script type="text/javascript" src="{{ URL('public/plugins/modernizr.js' ) }}"></script>

        <!-- Owl carousel javascript -->
        <script type="text/javascript" src="{{ URL('public/plugins/owl-carousel/owl.carousel.js') }}"></script>
        <!-- SmoothScroll javascript -->
        <script type="text/javascript" src="{{ URL('public/plugins/jquery.browser.js') }}"></script>
        <script type="text/javascript" src="{{ URL('public/plugins/SmoothScroll.js') }}"></script>
        <!-- Initialization of Plugins -->
        <script type="text/javascript" src="{{ URL('public/js/template.js') }}"></script>

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

<!-- Mirrored from htmlcoder.me/preview/the_project/v.1.3/template/components-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Jan 2017 12:00:20 GMT -->
</html>
