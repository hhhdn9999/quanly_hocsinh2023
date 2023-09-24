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
        <div class="col-md-4">
            <main>
            @if(isset ($hocsinhs))
            @foreach($hocsinhs as $hocsinh)
            <div id="card3">
                <div class="profile-text">
                <h2>Học sinh : {{$hocsinh->hocsinh_name}} - {{$hocsinh->lop_name}}</h2>
                <h4></h4>
                <h4>Học phần : {{$hocsinh->sobuoihoc_somonhoc}} buổi </h4>
                <h4>Ghi chú : {{$hocsinh->hocsinh_ghichu}}</h4>
                <h4>Môn học : {{$hocsinh->monhoc}}</h4>
                @if(isset ($diemdanhs))
                @php
                    $tongso_lan_diemdanh = 0;
                    $tongso_lan_di_hoc_trong_nam = 0;
                    $tongso_lan_vang_trong_nam = 0;
                    $tongso_lan_di_hoc_trong_thang = 0;
                    $tongso_lan_vang_trong_thang = 0;
                
                @endphp
                    @foreach($diemdanhs as $diemdanh)
                        @php
                        $tongso_lan_diemdanh += 1;
                        @endphp
                        <!-- trong năm -->
                        @if(isset($diemdanh->reasons))
                            @php $tongso_lan_vang_trong_nam+=1; @endphp
                        @else
                            @php $tongso_lan_di_hoc_trong_nam+=1; @endphp
                        @endif
                        <!-- trong tháng -->
                        <!-- 'chưa thanh toán buổi học này'   vắng nên ko tính học phí     đã thanh toán học phí buổi này -->
                        @if($diemdanh->hocphi == 'chưa thanh toán buổi học này')
                            @php $tongso_lan_di_hoc_trong_thang+=1; @endphp
                        @else @if($diemdanh->hocphi =='vắng nên ko tính học phí') @php $tongso_lan_vang_trong_thang+=1; @endphp @endif 
                        @endif
                    @endforeach
                    <p>Số lần điểm danh trong năm : {{$tongso_lan_diemdanh}}</p>
                    <p>Số lần đi học trong năm : {{$tongso_lan_di_hoc_trong_nam}}</p>
                    <p>Số lần vắng học trong năm : {{$tongso_lan_vang_trong_nam}}</p>
                    <p>------------------------------------------------------------------------</p>
                    <p>Số lần điểm danh trong tháng : {{$tongso_lan_di_hoc_trong_thang + $tongso_lan_vang_trong_thang}}</p>
                    <p>Số lần đi học trong tháng này : {{$tongso_lan_di_hoc_trong_thang}}</p>
                    <p>Số lần vắng học trong tháng này : {{$tongso_lan_vang_trong_thang}}</p>
                @endif
                </div>

                <a href="/thuphi/detail/thanhtoan/{{$hocsinh->hocsinh_id}}"><button type="button" class="btn btn-info">Thanh Toán</button></a>
            </div>
            @endforeach
            @endif
            </main>
            <p style="color: green">
                @if(Session::has('message_delete'))
                    {{"Delete Success"}}
                    @if(Session::forget('message_delete'))
                    @endif
                @endif
            </p>
        </div>
        <div class="col-md-8">
          
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
