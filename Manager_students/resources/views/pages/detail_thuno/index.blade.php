@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Chi tiết thu nợ</a></li>
    </ol>
    </nav>
</div>

<div>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">TÊN HỌC SINH</th>
                <th scope="col">THỜI GIAN HỌC LÚC</th>
                <th scope="col">THỨ VÀ NGÀY HỌC</th>
                <th scope="col">LÝ DO NGHỈ</th>
                <th scope="col">HOC PHÍ</th>
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
                <th scope="row">{{$stt}}</th>
                <td>{{$diemdanh->hocsinh_name}}</td>
                <td>{{$diemdanh->time_batdauhoc}}</td>
                <td>{{$diemdanh->day_and_thu_dihoc}}</td>
                <td>{{$diemdanh->reasons}}</td>
                <td>{{$diemdanh->hocphi}}</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div style="text-align: center"> 
            @if(isset($diemdanh))
                    
                <a style=" margin-right: 10%" target="_blank"  class="btn btn-success" href="{{ url('/printer/detail/'.$diemdanh->hocsinh_id) }}">In Detail</a>
                <a style=" margin-left: 10%"  class="btn btn-warning" href="/thuphi/detail/thanhtoan/{{$diemdanh->hocsinh_id}}">Thanh Toán</a>
            @endif
        </div>
    </div>
</div>    
<style>
* {
  font-size: 63, 5%;
  margin: 0;
  box-sizing: border-box;
}

main {
  width: 100rem;

  align-items: center;
  justify-content: center;
  gap: 12rem;
}




</style>
@endsection
