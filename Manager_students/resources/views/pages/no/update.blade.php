@extends('layouts.master')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.get.list.no')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.no')}}">Nợ</a></li>
                <li class="active">Chỉnh sửa Nợ</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        @include("pages.no.form")
    </div>
@endsection
