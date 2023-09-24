

    <div class="row">
        <div class="col-sm-2">
            <form class="form-inline" action="">
            {{ csrf_field() }}
                <div >
                    <button  type="submit" class="btn btn-info">CHECK</button>
                </div><br>
            
                <div class="form-group">
                    <select name="r_lops" id="" class="form-control">
                        <!-- <option value=""> Lớp</option> -->
                        <option value="">Lớp điểm danh</option>
                        <option value="6">Lớp 6</option>
                        <option value="7">Lớp 7</option>
                        <option value="8">Lớp 8</option>
                        <option value="9">Lớp 9</option>
                        <option value="10">Lớp 10</option>
                        <option value="11">Lớp 11</option>
                        <option value="12">Lớp 12</option>
                    </select>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br>

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
          

            </form>
        </div>
        <div class="col-sm-7">
            <form action="{{ url('/diemdanh/create') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <table class="table">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="start_buoihoc">TÊN THÒI GIAN BẮT ĐẦU HỌC :</label>
                            <input name="start_buoihoc" type="text" class="form-control" value="{{ old('start_buoihoc', isset($lop->lop_name) ? $lop->lop_name : '')}}" placeholder="Time ...">
                            @if($errors->has('start_buoihoc'))
                                <span class="error-text">
                                {{$errors->first('start_buoihoc')}}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="end_buoihoc">TÊN THÒI GIAN KẾT THÚC BUỔI HỌC :</label>
                            <input name="end_buoihoc" type="text" class="form-control" value="{{ old('end_buoihoc', isset($lop->lop_name) ? $lop->lop_name : '')}}" placeholder="Time ...">
                            @if($errors->has('end_buoihoc'))
                                <span class="error-text">
                                {{$errors->first('end_buoihoc')}}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">STT</th>
                        <th style="width: 20%" scope="col">Tên học sinh</th>
                        <th scope="col">Tên môn học</th>
                        <th  style="width: 35%" scope="col">Lý Do / Vắng</th>
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
                                    <div class="form-group " hidden="hidden">
                                        <label for="id_hocsinh{{ $stt  }}"></label>
                                        <input name="id_hocsinh{{ $stt  }}" type="text" class="form-control" value="{{$hocsinh->hocsinh_id}}">
                                    </div>
                                <th scope="row">{{ $stt  }}</th>
                                <td>{{$hocsinh->hocsinh_name}}</td>
                                <td>{{$hocsinh->monhoc}}</td>
                                    <td> 
                                        <input onclick="myFunction{{ $stt  }}()"  type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> Vắng</label><br>
                                        <input id="check_vang{{ $stt  }}"   type="text" id="fname" name="fname{{ $stt  }}">
                                    </td>
                                </tr>
                            @endforeach
                            <div hidden="hidden"><input  name="Get_tongsohocsinh" type="text" class="form-control" value="{{ $stt  }}"></div>
                            
                        @endif
                    </tbody>
                </table>
                <div class="text-center">
                    <div>
                    Tổng số học sinh : {{ $stt  }}
                    </div><br>
                    <button type="submit" class="btn btn-success ">ĐIỂM DANH</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <p style="color: green">
        @if(Session::has('message'))
            {{"Success"}}
            @if(Session::forget('message'))
            @endif
        @endif
    </p>
 


<script>
     @if(isset($hocsinhs))
        @php
            $stt = 0
        @endphp
            @foreach($hocsinhs as $hocsinh)
            @php
                $stt += 1
            @endphp

                document.getElementById("check_vang{{ $stt }}").style.display = "none";
                    function myFunction{{ $stt }}() {
                        var x = document.getElementById("check_vang{{ $stt }}");
                        if (x.style.display === "block") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "block";
                        }
                    }
            @php
            @endphp 
            @endforeach
    @endif
</script>