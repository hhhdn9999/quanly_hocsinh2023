@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Nợ</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">DANH SÁCH   <a class="pull-right btn btn-primary" href="{{ route('admin.get.create.no', $ids ) }}">Thêm mới</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID HỌC SINH</th>
                <th>TÊN HỌC SINH</th>
                <th>TÌNH TRẠNG</th>
                <th>HỌC PHÍ</th>
                <th>KHOẢNG THỜI GIAN</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($nos))
                @php
                    $stt = 0
                @endphp
                @foreach($nos as $no)
                @php
                    $stt += 1
                @endphp 
                    <tr>
                        <td>{{ $stt  }}</td>
                        <td>{{$no->id}}</td>
                        <td>{{$no->hocsinh_name}}</td>
                        @if($no->value == 'chưa nộp')
                            <td><button type="button" class="btn btn-danger">{{$no->value}}</button> </td>
                        @else
                            <td><button type="button" class="btn btn-success">{{$no->value}}</button> </td>
                        @endif

               
                        
                        <td>{{$no->sotienthieu}}</td>
                        <td>{{$no->timeKhoang}}</td>
                        <td>
                        @if($no->value == 'chưa nộp')
                            <a class="btn btn-primary" href="{{ route('admin.get.edit.no.detail.update', $no->id) }}">Update</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
        @endif
        </tbody>
    </table>
    <p style="color: green">
        @if(Session::has('message_delete'))
            {{"Delete Success"}}
            @if(Session::forget('message_delete'))
            @endif
        @endif
    </p>
</div>
@endsection
