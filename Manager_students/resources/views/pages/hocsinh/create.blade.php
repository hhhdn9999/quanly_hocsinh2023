@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.get.list.lop')}}">Trang chủ</a></li>
        <li class="active">Thêm học sinh</li>
    </ol>
    </nav>
</div>
<div class="container">
    @include("pages.hocsinh.form")
</div>
@endsection
