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
<h2 style="text-align: center">DANH SÁCH</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN HỌC SINH</th>
                <th>Xem Chi tiết</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($hocsinhs))
                @php
                    $stt = 0
                @endphp
                @foreach($hocsinhs as $hocsinh)
                @php
                    $stt += 1
                @endphp 
                    <tr>
                        <td>{{ $stt  }}</td>
                        <td>{{$hocsinh->hocsinh_name}}</td>
                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.get.edit.no.detail', $hocsinh->hocsinh_id) }}">Detail</a>
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
