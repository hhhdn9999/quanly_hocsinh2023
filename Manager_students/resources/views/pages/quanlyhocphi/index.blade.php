@extends('layouts.master')

@section('content')
<div class="page-header" >
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">Điểm danh</a></li>
    </ol>
    </nav>
</div>
<div class="table-responsive">
    <div class="row ">
        <div class="col-sm-12" style="text-align:center">
            <form class="form-inline" action="">
                <div class="form-group ">
                    <input name="r_hocsinh_name" type="text" class="form-control"  value="{{\Request::get('hocsinh_name')}}" placeholder="Tên học sinh ...">
                </div>
                <button  type="submit" class="btn btn-default">CHECK</button>
            </form>
        </div>
    </div><br>
    <div class="row ">

	<div class="section">
        <!-- container -->
        <div class="container" style="width: 100%">
            <!-- row -->
            <div class="row">
             
            @if(isset($hocsinhs))
                @php
                    $stt = 0
                @endphp
                @foreach($hocsinhs as $hocsinh)
                @php
                    $stt += 1
                @endphp 

                <!-- Product Single -->
                <div class="col-md-3">
                    <div class="product product-single border border-primary " style=" border-width: 3px;border-style: solid; -webkit-border-radius: 15px-moz-border-radius: 15px;border-radius: 15px; border-color: #5F9EA0; margin-bottom: 20px;">
                        <div class="product-body" >
                            <h6 style="text-align:center">{{$stt}}.{{$hocsinh->hocsinh_name}} - {{$hocsinh->lop_name}}</h6>
                            @if(isset($diemdanhs))
                            @php
                            $solan_diem_danh = 0;
                            $solan_di_hoc_ca_nam = 0;
                            $solan_vang_hoc_ca_nam = 0;
                            $solan_di_hoc_trong_thang = 0;
                     
                            @endphp
                                @foreach($diemdanhs as $diemdanh)
                                    @if($diemdanh->hocsinh_id == $hocsinh->hocsinh_id) 
                                            <!-- tổng số lần điểm danh cả năm -->
                                            @php
                                                $solan_diem_danh+= 1;
                                            @endphp
                                            <!-- tổng số lần đi học và vắng cả năm -->
                                           @if(isset($diemdanh->reasons))
                                                @php
                                                    $solan_vang_hoc_ca_nam+= 1;
                                                @endphp
                                           @else
                                                @php
                                                    $solan_di_hoc_ca_nam+= 1;
                                                    if($diemdanh->hocphi == 'chưa thanh toán buổi học này')
                                                    {
                                                        $solan_di_hoc_trong_thang += 1;
                                                    }
                                                @endphp
                                            @endif
                                             <!-- tổng số lần đi học và vắng trong thắng -->

                                    @else
                                        <!-- ko = sẽ vào đây -->
                                    @endif
                                @endforeach
                                <p style="text-align:center">Tổng Số lần điểm danh : {{$solan_diem_danh}}</p>
                                <p style="text-align:center">Tổng Số lần đi học trong năm : {{$solan_di_hoc_ca_nam}}</p> 
                                <p style="text-align:center">Tổng Số lần vắng trong năm : {{$solan_vang_hoc_ca_nam}}</p> 
                                <p style="text-align:center"  >
                                    <i   @if($solan_di_hoc_trong_thang >= $hocsinh->sobuoihoc_somonhoc && $hocsinh->sobuoihoc_somonhoc != 0 && $solan_di_hoc_trong_thang != 0)  class="abc" @endif >
                                        Trong tháng/Học phần : {{$solan_di_hoc_trong_thang}}/ {{$hocsinh->sobuoihoc_somonhoc}}
                                    </i>
                                </p> 
  
                            @endif
                                <p style="text-align:center">Id : {{$hocsinh->hocsinh_id}}</p>
                            <div class="product-btns" style="text-align:center">
                            <a href="/thuphi/detail/{{$hocsinh->hocsinh_id}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
                            
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                @endforeach
            @endif
           
  
                <!-- /Product Single -->
            </div>
            <!-- /row -->
        </div><br>
        <!-- /container -->
    </div>
</div></div></div>
    
    <script src=”https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js”></script>
    
<script>
new WOW().init();
</script>
    
</body>
</html>

    </div>
    <p style="color: green">
        @if(Session::has('message_delete'))
            {{"Delete Success"}}
            @if(Session::forget('message_delete'))
            @endif
        @endif
    </p>
</div>

<style>

@keyframes blink {
  0% {
    background: violet;
  }
  14.3% {
    background: indigo;
  }
  28.6% {
    background: blue;
  }
  42.9% {
    background: green;
  }
  57.2% {
    background: yellow;
  }
  71.5% {
    background: orange;
  }
  85.8% {
    background: red;
  }
  100% {
    background: violet;
  }
}

@-webkit-keyframes blink {
  0% {
    background: violet;
  }
  14.3% {
    background: indigo;
  }
  28.6% {
    background: blue;
  }
  42.9% {
    background: green;
  }
  57.2% {
    background: yellow;
  }
  71.5% {
    background: orange;
  }
  85.8% {
    background: red;
  }
  100% {
    background: violet;
  }
}

.abc {

  color:#fff;
  border: 1px solid black;
  animation: blink 20s linear infinite;
  -webkit-animation: blink 20s linear infinite;
}
</style>
@endsection
