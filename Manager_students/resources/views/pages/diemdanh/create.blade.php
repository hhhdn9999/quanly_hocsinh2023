@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.get.list.diemdanh')}}">Trang chủ</a></li>
        <li class="active">Thêm Điểm danh</li>
    </ol>
    </nav>
</div>
<div class="container">
    @include("pages.diemdanh.form")
</div>
@endsection
