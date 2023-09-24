@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Điểm danh</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<div class="row ">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="form-group ">
                <input name="r_hocsinh_name" type="text" class="form-control"  value="{{\Request::get('hocsinh_name')}}" placeholder="Tên học sinh ...">
            </div>
            <button  type="submit" class="btn btn-default">CHECK</button>

        </form>
    </div>
</div>
<h2 style="text-align: center">QUẢN LÝ ĐIỂM DANH   <a class="pull-right btn btn-primary" href="{{ route('admin.get.create.diemdanh') }}">Thêm mới</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN HỌC SINH</th>
                <th style="width: 17%">THỜI GIAN HỌC LÚC </th>
                <th>THỨ VÀ NGÀY HỌC</th>
                <th>LÝ DO NGHỈ</th>
                <th style="width: 15%">HỌC PHÍ</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($diemdanhs))
                @php
                    $stt = 0
                @endphp
                @foreach($diemdanhs as $diemdanh)
                @php
                    $stt += 1
                @endphp 
                    <tr>
                        <td>{{ $stt  }}</td>
                        <td>{{$diemdanh->hocsinh_name}}</td>
                        <td>{{$diemdanh->time_batdauhoc}}</td>
                        <td>{{$diemdanh->day_and_thu_dihoc}}</td>
                        <td>{{$diemdanh->reasons}}</td>
                        <td>{{$diemdanh->hocphi}}</td>
                        <td>
                        
                            <a class="btn btn-primary" href="{{ route('admin.get.delete.diemdanh', $diemdanh->id) }}">Delete</a>
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
