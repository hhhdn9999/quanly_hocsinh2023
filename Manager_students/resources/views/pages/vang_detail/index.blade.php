@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Lý do vắng</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">XEM LÝ DO VẮNG CỦA HỌC SINH</h2><BR></BR>
    <div class="row " style="text-align: center">
        <div class="col-sm-12">
            <form class="form-inline" action="{{ route('admin.get.list.vang_detail') }}">
                <div class="form-group ">
                    <input name="r_hocsinh_name" type="text" class="form-control"  value="{{\Request::get('hocsinh_name')}}" placeholder="Tên học sinh ...">
                </div>
                <button  type="submit" class="btn btn-default">CHECK</button>

            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN HỌC SINH</th>
                <th>ID HỌC SINH</th>
                <th>LÝ DO VẮNG</th>
                <th>THỜI GIAN VẮNG</th>
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
                        <td><b>{{ $stt  }}</b></td>
                        <td>{{$hocsinh->hocsinh_name}}</td>
                        <td>{{$hocsinh->hocsinh_id}}</td>
                        <td>{{$hocsinh->reasons}}</td>
                        <td>{{$hocsinh->day_and_thu_dihoc}}</td>
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
