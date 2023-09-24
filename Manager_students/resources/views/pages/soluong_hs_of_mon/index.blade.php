@extends('layouts.master')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li class="active"><a href="">SỐ LƯỢNG HỌC SINH CỦA MỖI MÔN</a></li>
    </ol>
    </nav>
</div>

<div class="table-responsive">
<h2 style="text-align: center">SỐ LƯỢNG HỌC SINH CỦA MỖI MÔN</h2>
    <table class="table table-striped">
        <thead>
            <tr>
             
            </tr><br><br>
        </thead>
        <tbody>
            <!-- //lớp 7 -->
            <tr>
                @if(isset($hocsinhs_lop7))
                        @php
                            $stt = 0;
                            $hs_lop7 = 0;
                        @endphp
                        @foreach($hocsinhs_lop7 as $hocsinh_lop7)
                        @php
                            $stt += 1;
                            $hs_lop7 += 1;
                        @endphp 
                        @endforeach
                        <th>Tổng học sinh lớp 7 có :   {{ $hs_lop7  }} học sinh</th>
                @endif
            </tr>

            <tr>
                @if(isset($hocsinhs_lop7_toan))
                        @php
                            $stt = 0;
                            $hs_lop7 = 0;
                        @endphp
                        @foreach($hocsinhs_lop7_toan as $hocsinh_lop7_toan)
                        @php
                            $stt += 1;
                            $hs_lop7 += 1;
                        @endphp 
                        @endforeach
                        <th>Toán 7 có :   {{ $hs_lop7  }} học sinh</th>
                @endif
            </tr>

            <tr>
                @if(isset($hocsinhs_lop7_khtn))
                        @php
                            $stt = 0;
                            $hs_lop7 = 0;
                        @endphp
                        @foreach($hocsinhs_lop7_khtn as $hocsinh_lop7_khtn)
                        @php
                            $stt += 1;
                            $hs_lop7 += 1;
                        @endphp 
                        @endforeach
                        <th>KHTN 7 có :   {{ $hs_lop7  }} học sinh</th>
                @endif
            </tr>
                <!-- lớp 6 -->
            <tr>
                @if(isset($hocsinhs_lop6))
                        @php
                            $stt = 0;
                            $sl_hs = 0;
                        @endphp
                        @foreach($hocsinhs_lop6 as $hocsinh_lop6)
                        @php
                            $stt += 1;
                            $sl_hs += 1;
                        @endphp 
                        @endforeach
                        <th>Tổng học sinh lớp 6 có :   {{ $sl_hs  }} học sinh</th>
                @endif
            </tr>
            <tr>
                @if(isset($hocsinhs_lop6_toan))
                        @php
                            $stt = 0;
                            $sl_hs = 0;
                        @endphp
                        @foreach($hocsinhs_lop6_toan as $hocsinh_lop6_toan)
                        @php
                            $stt += 1;
                            $sl_hs += 1;
                        @endphp 
                        @endforeach
                        <th>Toán 7 có :  {{ $sl_hs  }} học sinh</th>
                @endif
            </tr>
            <tr>
                @if(isset($hocsinhs_lop6_khtn))
                        @php
                            $stt = 0;
                            $sl_hs = 0;
                        @endphp
                        @foreach($hocsinhs_lop6_khtn as $hocsinh_lop6_khtn)
                        @php
                            $stt += 1;
                            $sl_hs += 1;
                        @endphp 
                        @endforeach
                        <th>KHTN 7 có :  {{ $sl_hs  }} học sinh</th>
                @endif
            </tr>
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
