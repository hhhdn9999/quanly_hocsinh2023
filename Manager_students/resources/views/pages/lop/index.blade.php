@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Lớp</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">DANH SÁCH LỚP   <a class="pull-right btn btn-primary" href="{{ route('admin.get.create.lop') }}">Thêm mới</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN LỚP</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($lops))
                @php
                    $stt = 0
                @endphp
                @foreach($lops as $lop)
                @php
                    $stt += 1
                @endphp 
                    <tr>
                        <td>{{ $stt  }}</td>
                        <td>{{$lop->lop_name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.get.edit.lop', $lop->id) }}">Edit</a>
                            <a class="btn btn-primary" href="{{ route('admin.get.delete.lop', $lop->id) }}">Delete</a>
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
