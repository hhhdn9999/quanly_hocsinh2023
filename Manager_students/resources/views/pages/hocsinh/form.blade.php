<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
 
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="hocsinh_name">TÊN HỌC SINH :</label>
                <input name="hocsinh_name" type="text" class="form-control" value="{{ old('hocsinh_name', isset($hocsinh->hocsinh_name) ? $hocsinh->hocsinh_name : '')}}" placeholder="Tên học sinh ...">
                @if($errors->has('hocsinh_name'))
                    <span class="error-text">
                    {{$errors->first('hocsinh_name')}}
                </span>
                @endif  
            </div>

            <div class="form-group ">
                <label for="lop_hs">LỚP :</label>
                <select name="lop_hs"  class="form-control">
                    <option value="">Choose Lớp</option>
                    @if(isset($lops) )
                        @foreach($lops as $lop)
                            <option
                                @if(isset($lop))
                                @if(($lop->id) == ($lop->id))
                                {{"selected"}}
                                @endif
                                @endif
                                value="{{  $lop->id}}">{{ $lop->lop_name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('lop_hs'))
                    <span class="error-text">
                        {{$errors->first('lop_hs')}}
                    </span>
                @endif
            </div>
            
            <div class="form-group ">
                <label for="mon_hoc">MÔN HỌC :</label>
                <select name="mon_hoc"  class="form-control">
                    <option value="">Choose Môn học</option>
                    @if(isset($monhocs) )
                        @foreach($monhocs as $monhoc)
                            <option
                                @if(isset($monhoc))
                                @if(($monhoc->id) == ($monhoc->id))
                                {{"selected"}}
                                @endif
                                @endif
                                value="{{  $monhoc->id}}">{{ $monhoc->monhoc}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('mon_hoc'))
                    <span class="error-text">
                        {{$errors->first('mon_hoc')}}
                    </span>
                @endif
            </div>
            <div class="form-group ">
                <label for="sobuoihoc_somonhoc">HỌC PHẦN :</label>
                <input name="sobuoihoc_somonhoc" type="text" class="form-control" value="{{ old('sobuoihoc_somonhoc', isset($hocsinh->sobuoihoc_somonhoc) ? $hocsinh->sobuoihoc_somonhoc : '')}}" placeholder="Số học phần ...">
                @if($errors->has('sobuoihoc_somonhoc'))
                    <span class="error-text">
                    {{$errors->first('sobuoihoc_somonhoc')}}
                </span>
                @endif
            </div>
            <div class="form-group ">
                <label for="hocsinh_ghichu">GHI CHÚ HỌC SINH :</label>
                <input name="hocsinh_ghichu" type="text" class="form-control" value="{{ old('hocsinh_ghichu', isset($hocsinh->hocsinh_ghichu) ? $hocsinh->hocsinh_ghichu : '')}}" placeholder="Ghi chú học sinh ...">
                @if($errors->has('hocsinh_ghichu'))
                    <span class="error-text">
                    {{$errors->first('hocsinh_ghichu')}}
                </span>
                @endif
            </div>
            <div class="form-group ">
                <label for="hocsinh_image">IMAGE HỌC SINH :</label>
                <input name="hocsinh_image" type="file" class="form-control"  value="{{ old('hocsinh_image', isset($lop->p_name) ? $lop->p_name : '') }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    <br><br>
    <p style="color: green">
        @if(Session::has('message'))
            {{"Success"}}
            @if(Session::forget('message'))
            @endif
        @endif
    </p>
</form>
