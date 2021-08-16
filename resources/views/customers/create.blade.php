@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Thêm mới khách hàng</h5>

    </div>

    <div class="card-body">
        <form action="/customers" method="post">
            @csrf
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <input name="name" id="name" type="text" placeholder="Tên khách hàng" class="form-control" required>
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
                <div class="form-group row"><label class="col-md-2 col-form-label">Địa chỉ</label>
                    <div class="col-md-10">
                        <input name="address" id="address" type="text" placeholder="Địa chỉ" class="form-control">
                        @error('address')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Ghi chú</label>
                    <div class="col-md-10">
                        <textarea name="note" rows="5" class="form-control"></textarea>
                        @error('sell_price')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Nhân viên hỗ trợ</label>
                    <div class="col-md-10">
                        <select name="user_id" class="form-control select-search">
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if(auth()->user()->id == $user->id) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
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