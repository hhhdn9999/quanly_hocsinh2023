master<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
    <title>DANH SÁCH</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('theme_admin/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{asset('theme_admin/js/ie-emulation-modes-warning.js')}}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="#">QUẢN LÝ LỚP HỌC ĐIỂM DANH HỌC SINH 2023 - 2024</a>
        </div>
{{--        <div id="navbar" class="navbar-collapse collapse">--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <li><a href="#">Dashboard</a></li>--}}
{{--                <li><a href="#">Settings</a></li>--}}
{{--                <li><a href="#">Profile</a></li>--}}
{{--                <li><a href="#">Help</a></li>--}}
{{--            </ul>--}}
{{--            <form class="navbar-form navbar-right">--}}
{{--                <input type="text" class="form-control" placeholder="Search...">--}}
{{--            </form>--}}
{{--        </div>--}}
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
            <li class="{{\Request::route()->getName() == 'admin.get.list.lop' ? 'active' : ''}}"><a href="{{route('admin.get.list.lop')}}">QUẢN LÝ LỚP</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.monhoc' ? 'active' : ''}}"><a href="{{route('admin.get.list.monhoc')}}">QUẢN LÝ MÔN HỌC</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.hocsinh' ? 'active' : ''}}"><a href="{{route('admin.get.list.hocsinh')}}">QUẢN LÝ HỌC SINH</a></li>
            <li class=""><a href="#">=======================</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.vang' ? 'active' : ''}}"><a href="{{route('admin.get.list.vang')}}">XEM LÝ DO HỌC SINH VẮNG</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.diemdanh' ? 'active' : ''}}"><a href="{{route('admin.get.list.diemdanh')}}">QUẢN LÝ ĐIỂM DANH</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.thuphi' ? 'active' : ''}}"><a href="{{route('admin.get.list.thuphi')}}">QUẢN LÝ THU PHÍ</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.no' ? 'active' : ''}}"><a href="{{route('admin.get.list.no')}}">QUẢN LÝ NỢ</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.conno' ? 'active' : ''}}"><a href="{{route('admin.get.list.conno')}}">HỌC SINH CÒN NỢ</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.danop' ? 'active' : ''}}"><a href="{{route('admin.get.list.danop')}}">ĐÀ NỘP / TỔNG $</a></li>
            <li class=""><a href="#">=======================</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.check.hocphi' ? 'active' : ''}}"><a href="{{route('admin.get.list.check.hocphi')}}">CHECK</a></li>
            <li class="{{\Request::route()->getName() == 'admin.get.list.soluong.mon' ? 'active' : ''}}"><a href="{{route('admin.get.list.soluong.mon')}}">SỐ LƯỢNG HS CỦA MÔN</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<!-- <script src="js/holder.min.js"></script> -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
