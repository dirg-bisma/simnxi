﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIPNXI | TI-NXI</title>
    <!-- Favicon-->
    <?php $base = "bower_components/adminbsb/"?>
    <link rel="icon" href="{{ asset($base.'favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset($base.'plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset($base.'plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset($base.'plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset($base.'plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset($base.'css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset($base.'css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->

<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ URL::to('/') }}">SIPNXI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset($base.'images/user.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                <div class="email">john.doe@example.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('onfarm-dashboard-index') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('onfarm-taksasi-bbpm-index') }}" class="loaded_konten">
                        <i class="material-icons">spa</i>
                        <span>Berat Batang</span>
                    </a>
                </li>

                <li class="header">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">accessibility</i>
                        <span>Petugas</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('setting-users-list') }}" class="loaded_konten">
                                <i class="material-icons">input</i>
                                <span>Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('setting-users-form-add') }}" class="loaded_konten">
                                <i class="material-icons">check_circle</i>
                                <span>Daftarkan Petugas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="header">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">swap_calls</i>
                        <span>Taksasi</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('onfarm-taksasi-index') }}" class="loaded_konten">
                                <i class="material-icons">streetview</i>
                                <span>Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('onfarm-taksasi-form-edit') }}" class="loaded_konten">
                                <i class="material-icons">assignment_ind</i>
                                <span>New Taksasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">TI - PTPNXI</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>

        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div id="konten"></div>
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{ asset($base.'plugins/jquery/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset($base.'plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset($base.'plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset($base.'plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset($base.'plugins/node-waves/waves.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset($base.'plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset($base.'plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<script src="{{ asset($base.'js/pages/ui/notifications.js') }}"></script>
<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset($base.'plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset($base.'js/admin.js') }}"></script>
<script src="{{ asset($base.'js/pages/tables/jquery-datatable.js') }}"></script>
<!-- Demo Js -->
<script src="{{ asset($base.'js/demo.js') }}"></script>
</body>

</html>