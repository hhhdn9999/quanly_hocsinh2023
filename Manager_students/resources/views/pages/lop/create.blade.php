@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.get.list.lop')}}">Trang chủ</a></li>
        <li class="active">Thêm lớp</li>
    </ol>
    </nav>
</div>
<div class="container">
    @include("pages.lop.form")
</div>
@endsection
