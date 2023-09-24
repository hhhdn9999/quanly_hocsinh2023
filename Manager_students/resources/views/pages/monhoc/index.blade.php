@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Môn học</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">DANH SÁCH MÔN HỌC   <a class="pull-right btn btn-primary" href="{{ route('admin.get.create.monhoc') }}">Thêm mới</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT / ID</th>
                <th>TÊN MÔN HỌC</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($monhocs))
                @php
                    $stt = 0
                @endphp
                @foreach($monhocs as $monhoc)
                @php
                    $stt += 1
                @endphp 
                    <tr>
                        <td>{{ $stt  }} / {{$monhoc->id}} </td>
                        <td>{{$monhoc->monhoc}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.get.edit.monhoc', $monhoc->id) }}">Edit</a>
                            <a class="btn btn-primary" href="{{ route('admin.get.delete.monhoc', $monhoc->id) }}">Delete</a>
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
