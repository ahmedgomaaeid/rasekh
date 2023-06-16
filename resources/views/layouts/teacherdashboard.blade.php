<?php
    $teacher = Auth::guard('teacher')->user();
?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @livewireStyles
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{route('index')}}/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>لوحة التحكم </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{route('index')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{route('index')}}/assets/css/style.css" rel="stylesheet" />
    <link href="{{route('index')}}/assets/css/dark-style.css" rel="stylesheet" />
    <link href="{{route('index')}}/assets/css/transparent-style.css" rel="stylesheet">
    <link href="{{route('index')}}/assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{route('index')}}/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{route('index')}}/assets/colors/color1.css" />

</head>

<body class="app sidebar-mini rtl light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{route('index')}}/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="{{route('get.teacher.dashboard')}}">
                            <img src="{{route('index')}}/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{route('index')}}/assets/images/brand/logo3.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                    <!-- notification -->
                                        <div class="dropdown  d-flex notifications">
                                            @livewire('teacher.seen')
                                            @livewire('teacher.notify')
                                        </div>
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                @if($teacher->photo != null)
                                                    <img src="{{route('index')}}/assets/images/teachers/{{$teacher->photo}}" alt="profile-user"
                                                        class="avatar  profile-user brround cover-image">
                                                @else
                                                    <img src="{{route('index')}}/assets/images/users/21.jpg" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                                @endif
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{$teacher->name}}</h5>
                                                        <small class="text-muted">معلم</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="{{route('get.teacher.profile')}}">
                                                    <i class="dropdown-icon fe fe-user"></i> تعديل حسابك 
                                                </a>
                                                <a class="dropdown-item" href="{{route('teacher.logout')}}">
                                                    <i class="dropdown-icon fa fa-sign-out"></i> تسجيل الخروج
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="{{route('get.admin.dashboard')}}">
                            <img src="{{route('index')}}/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{route('index')}}/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                                alt="logo">
                            <img src="{{route('index')}}/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                            <img src="{{route('index')}}/assets/images/brand/logo3.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>الرئسية</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('get.teacher.dashboard')}}"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">لوحة التحكم</span></a>
                            </li>
                            <li class="sub-category">
                                <h3>البث المباشر</h3>
                            </li>
                            @if(Auth::guard('teacher')->user()->live_access=='مفعل')
                                <li class="slide">
                                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('get.teacher.zoom-integration')}}"><i
                                            class="side-menu__icon fa fa-video-camera"></i><span
                                            class="side-menu__label">اعدادات الزووم</span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('get.teacher.zoom-meeting')}}"><i
                                            class="side-menu__icon icon-control-play"></i><span
                                            class="side-menu__label">البث المباشر</span></a>
                                </li>
                            @endif
                            @if(Auth::guard('teacher')->user()->course_access=='مفعل')
                                <li class="sub-category">
                                    <h3>الكورسات</h3>
                                </li>
                                <li>
                                    <a class="side-menu__item has-link" href="{{route('get.teacher.lesson')}}"><i class="side-menu__icon fa fa-play-circle"></i><span
                                            class="side-menu__label">الفيديوهات و الاختبارات</span></a>
                                </li>
                            @endif
                            <li class="sub-category">
                                <h3>الخروج</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('teacher.logout')}}"><i
                                        class="side-menu__icon fa fa-sign-out"></i><span 
                                        class="side-menu__label">تسجيل الخروج</span></a>
                                        
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            @yield('content')
            <!--app-content close-->

        </div>

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{route('index')}}/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{route('index')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{route('index')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="{{route('index')}}/assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="{{route('index')}}/assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{route('index')}}/assets/js/circle-progress.min.js"></script>

    <!-- INPUT MASK JS-->
    <script src="{{route('index')}}/assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="{{route('index')}}/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="{{route('index')}}/assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{route('index')}}/assets/plugins/select2/select2.full.min.js"></script>
    <script src="{{route('index')}}/assets/js/select2.js"></script>

    <!-- SIDEBAR JS -->
    <script src="{{route('index')}}/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{route('index')}}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="{{route('index')}}/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="{{route('index')}}/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{route('index')}}/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="{{route('index')}}/assets/plugins/chart/rounded-barchart.js"></script>
    <script src="{{route('index')}}/assets/plugins/chart/utils.js"></script>


    <!-- INTERNAL Data tables js-->
    <script src="{{route('index')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{route('index')}}/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{route('index')}}/assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{route('index')}}/assets/js/apexcharts.js"></script>
    <script src="{{route('index')}}/assets/plugins/apexchart/irregular-data-series.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{route('index')}}/assets/plugins/flot/jquery.flot.js"></script>
    <script src="{{route('index')}}/assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="{{route('index')}}/assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="{{route('index')}}/assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{route('index')}}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{route('index')}}/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{route('index')}}/assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="{{route('index')}}/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="{{route('index')}}/assets/js/typehead.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{route('index')}}/assets/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="{{route('index')}}/assets/js/themeColors.js"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{route('index')}}/assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="{{route('index')}}/assets/plugins/fileuploads/js/file-upload.js"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{route('index')}}/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="{{route('index')}}/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="{{route('index')}}/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="{{route('index')}}/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="{{route('index')}}/assets/plugins/fancyuploder/fancy-uploader.js"></script>
    <!-- BOOTSTRAP-DATERANGEPICKER JS -->
    <script src="{{route('index')}}/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script src="{{route('index')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{route('index')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
    <!-- FORMELEMENTS JS -->
    <script src="{{route('index')}}/assets/js/formelementadvnced.js"></script>
    <script src="{{route('index')}}/assets/js/form-elements.js"></script>



    <!-- INTERNAL Sumoselect js-->
    <script src="{{route('index')}}/assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!-- TIMEPICKER JS -->
    <script src="{{route('index')}}/assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="{{route('index')}}/assets/plugins/time-picker/toggles.min.js"></script>

    <!-- INTERNAL intlTelInput js-->
    <script src="{{route('index')}}/assets/plugins/intl-tel-input-master/intlTelInput.js"></script>
    <script src="{{route('index')}}/assets/plugins/intl-tel-input-master/country-select.js"></script>
    <script src="{{route('index')}}/assets/plugins/intl-tel-input-master/utils.js"></script>

    <!-- INTERNAL jquery transfer js-->
    <script src="{{route('index')}}/assets/plugins/jQuerytransfer/jquery.transfer.js"></script>

    <!-- INTERNAL multi js-->
    <script src="{{route('index')}}/assets/plugins/multi/multi.min.js"></script>

    <!-- DATEPICKER JS -->
    <script src="{{route('index')}}/assets/plugins/date-picker/date-picker.js"></script>
    <script src="{{route('index')}}/assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="{{route('index')}}/assets/plugins/input-mask/jquery.maskedinput.js"></script>

    <!-- Internal Chat js-->
    <script src="{{route('index')}}/assets/js/chat.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{route('index')}}/assets/js/custom.js"></script>

    @livewireScripts()

</body>

</html>