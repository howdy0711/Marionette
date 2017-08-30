<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>관리자 페이지</title>
    <link href="adminpublic/css/bootstrap.css" rel="stylesheet" />
    <link href="adminpublic/css/font-awesome.css" rel="stylesheet" />
    <link href="adminpublic/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{secure_asset('css/ma-admin.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
    <script src="{{secure_asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{secure_asset('js/mario.js')}}"></script>
    <!--<script src="{{secure_asset('js/mainApp.js')}}"></script>-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="{{secure_asset('js/turn.js')}}"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>킹가이즈 팀</strong>
                    &nbsp;&nbsp;
                    
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.html">-->

                    <!--<img src="adminpublic/img/logo.png" />-->
                <!--</a>-->

            </div>
            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <!--<a class="media-left" href="#">-->
                                    <!--    <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />-->
                                    <!--</a>-->
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>
    
                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>
    
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
            @yield('content')
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!--<script src="adminpublic/js/jquery-1.11.1.js"></script>-->
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="adminpublic/js/bootstrap.js"></script>
        <script src="js/jquery.min.1.7.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/turn.js"></script>
        <script src="adminpublic/js/bootstrap.js"></script>
        <script src="adminpublic/js/admin.js"></script>

</body>
</html>
