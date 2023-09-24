<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="id_hs">ID HỌC SINH :</label>
                <input name="id_hs" type="text" class="form-control" value="{{$ids}}" placeholder="{{$ids}}">
                @if($errors->has('id_hs'))
                    <span class="error-text">
                    {{$errors->first('id_hs')}}
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="sotienthieu">SỐ TIỀN THIẾU   :</label>
                <input name="sotienthieu" type="text" class="form-control" value="{{ old('sotienthieu', isset($no->sotienthieu) ? $no->sotienthieu : '')}}" placeholder="Số tiền nợ ...">
                @if($errors->has('sotienthieu'))
                    <span class="error-text">
                    {{$errors->first('sotienthieu')}}
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="thoigian_tu">THỜI GIAN TỪ   :</label>
                <input name="thoigian_tu" type="text" class="form-control" value="{{ old('thoigian_tu')}}" placeholder="Thời gian ...">
                @if($errors->has('thoigian_tu'))
                    <span class="error-text">
                    {{$errors->first('thoigian_tu')}}
                </span>
                @endif
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
