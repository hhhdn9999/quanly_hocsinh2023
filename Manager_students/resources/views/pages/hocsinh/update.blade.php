@extends('layouts.master')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.get.list.hocsinh')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.hocsinh')}}">Học sinh</a></li>
                <li class="active">Chỉnh sửa Thông tin học sinh</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        @include("pages.hocsinh.form")
    </div>
@endsection
