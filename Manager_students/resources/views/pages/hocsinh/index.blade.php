@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Học sinh</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<div class="row ">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="form-group">
                <select name="r_lops" id="" class="form-control">
                    <!-- <option value=""> Lớp</option> -->
                    <option value="">Tất cả các lớp</option>
                    <option value="6">Lớp 6</option>
                    <option value="7">Lớp 7</option>
                    <option value="8">Lớp 8</option>
                    <option value="9">Lớp 9</option>
                    <option value="10">Lớp 10</option>
                    <option value="11">Lớp 11</option>
                    <option value="12">Lớp 12</option>
                </select>
            </div>
            <div class="form-group">
                <select name="r_monhocs"  class="form-control">
                    <option value="">Môn học</option>
                    @if(isset($monhocs))
                        @php
                            $no = 0;
                        @endphp
                        @foreach($monhocs as $monhoc)
                            @php
                                $no += 1;
                            @endphp
                            <option value="{{$monhoc->id}}" {{\Request::get('monhoc') == $monhoc->id ? 'selected' : ''}}>{{$no . ".  " . $monhoc->monhoc}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button  type="submit" class="btn btn-default">CHECK</button>

        </form>
    </div>
</div>
<h2 style="text-align: center">DANH SÁCH HỌC SINH    <a class="pull-right btn btn-primary" href="{{ route('admin.get.create.hocsinh') }}">Thêm mới</a></h2>
    <table class="table table-striped">
        <thead>
        @if(isset($hocsinhs))
                @php
                    $stt = 0
                @endphp
                @foreach($hocsinhs as $hocsinh)
                @php
                    $stt += 1
                @endphp 
                @endforeach
        @endif
        <tr >
            <br>
        <div style="text-align: center; ">Tổng số học sinh : {{ $stt  }}</div><br>
            </tr>
            <tr>
                <th style="width: 5%">STT</th>
                <th>TÊN HỌC SINH</th>
                <th>LỚP</th>
                <th>MÔN HỌC</th>
                <th>HỌC PHẦN / SỐ BUỔI</th>
                <th>GHI CHÚ HỌC SINH</th>
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
                        <td>Id/{{$hocsinh->lop_name}}</td>
                        <td>{{$hocsinh->id_monhoc}} {{$hocsinh->monhoc}}</td>
                        <td>{{$hocsinh->sobuoihoc_somonhoc}}</td>
                        <td>{{$hocsinh->hocsinh_ghichu}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.get.edit.hocsinh', $hocsinh->hocsinh_id) }}">Edit</a>
                            <a class="btn btn-primary" href="{{ route('admin.get.delete.hocsinh', $hocsinh->hocsinh_id) }}">Delete</a>
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
