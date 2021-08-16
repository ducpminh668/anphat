@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Sửa thông tin khách hàng: {{$customer->name}}</h5>

    </div>

    <div class="card-body">
        <form action="{{route('customers.update', $customer->id)}}" method="post">
            @csrf
            @method('put')
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <input name="name" id="name" type="text" placeholder="Tên khách hàng" class="form-control" required value="{{$customer->name}}">
                        @error('name')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Số điện thoại</label>
                    <div class="col-md-10">
                        <input name="phone" id="phone" type="text" placeholder="Số điện thoại" class="form-control" value="{{$customer->phone}}">
                        @error('phone')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Địa chỉ</label>
                    <div class="col-md-10">
                        <input name="address" id="address" type="text" placeholder="Địa chỉ" class="form-control" value="{{$customer->address}}">
                        @error('address')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Ghi chú</label>
                    <div class="col-md-10">
                        <textarea name="note" rows="5" class="form-control">{{$customer->note}}</textarea>
                        @error('sell_price')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Nhân viên hỗ trợ</label>
                    <div class="col-md-10">
                        <select name="user_id" class="form-control select-search">
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($customer->user_id == $user->id) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@stop