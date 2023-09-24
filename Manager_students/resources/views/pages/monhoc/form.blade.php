<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="mon_hoc">TÊN MÔN HỌC :</label>
                <input name="mon_hoc" type="text" class="form-control" value="{{ old('mon_hoc', isset($monhoc->monhoc) ? $monhoc->monhoc : '')}}" placeholder="Tên môn học ...">
                @if($errors->has('mon_hoc'))
                    <span class="error-text">
                    {{$errors->first('mon_hoc')}}
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
