<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group ">
                <label for="name_lop">TÊN LỚP :</label>
                <input name="name_lop" type="text" class="form-control" value="{{ old('name_lop', isset($lop->lop_name) ? $lop->lop_name : '')}}" placeholder="Tên lớp ...">
                @if($errors->has('name_lop'))
                    <span class="error-text">
                    {{$errors->first('name_lop')}}
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
