@extends('layouts.master')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.get.list.monhoc')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.monhoc')}}">Môn học</a></li>
                <li class="active">Chỉnh sửa Môn học</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        @include("pages.monhoc.form")
    </div>
@endsection
