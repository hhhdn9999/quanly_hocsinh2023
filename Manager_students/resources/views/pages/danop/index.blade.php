@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Những học sinh đà nộp</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">DANH SÁCH NHỮNG HỌC SINH ĐÃ NỘP</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN HỌC SINH</th>
                <th>ID HỌC SINH</th>
                <th>LỚP</th>
                <th>SỐ TIỀN THIẾU</th>
                <th>KHOẢNG T/G HỌC</th>
                <th>TÌNH TRẠNG</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($hocsinhs))
                @php
                    $stt = 0;
                    $tong_tien = 0;
                @endphp
                @foreach($hocsinhs as $hocsinh)
                @php
                    $stt += 1;
                @endphp 
                    <tr>
                        <td><b>{{ $stt  }}</b></td>
                        <td>{{$hocsinh->hocsinh_name}}</td>
                        <td>{{$hocsinh->hocsinh_id}}</td>
                        <td><b>{{$hocsinh->lop_name}}</b></td>
                        <td>{{$hocsinh->sotienthieu}}</td>
                        <td>{{$hocsinh->timeKhoang}}</td>
                        <td>{{$hocsinh->value}}</td>
                    </tr>
                @endforeach
                @foreach((array)$tiens as $tien)
                <p><b>Tổng $ =  {{$tien}}k </b></p>
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
