@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Thêm mới người dùng hệ thống</h5>

    </div>

    <div class="card-body">
        <form action="/users" method="post">
            @csrf
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên người dùng</label>
                    <div class="col-md-10">
                        <input name="name" id="name" type="text" placeholder="Tên người dùng" class="form-control" required>
                        @error('name')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Số điện thoại</label>
                    <div class="col-md-10">
                        <input name="phone" id="phone" type="text" placeholder="Số điện thoại" class="form-control">
                        @error('phone')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input name="email" id="email" type="text" placeholder="Email" class="form-control" required>
                        @error('email')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="form-group row"><label class="col-md-2 col-form-label">Phân quyền</label>
                    <div class="col-md-10">
                        <select name="role" class="form-control select-search">
                            @foreach($roles as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Mật khẩu</label>
                    <div class="col-md-10">
                        <input name="password" id="password" type="password" placeholder="Mật khẩu" class="form-control">
                        @error('password')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
        </form>
    </div>
</div>
@stop