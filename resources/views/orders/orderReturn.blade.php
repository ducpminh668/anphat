@extends('layouts.app')

@section('content')
<form action="/orders" method="post" onsubmit="return checkAdminCart()">
    @csrf
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Tạo đơn hàng</h5>

        </div>

        <div class="card-body">

            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <select class="form-control select-remote-data" data-fouc style="min-height:37px">
                            <option value="">Chọn khách hàng</option>
                        </select>
                        <input name="contact_name" id="contact_name" type="hidden" class="form-control">
                        <input name="email" id="email" type="hidden" class="form-control" required>
                        <input name="customer_id" id="customer_id" type="hidden" class="form-control" required>
                        <input type="hidden" name="cart" id="cart-field">
                        <style>
                            .select2-selection--single {
                                height: 37px;
                            }
                        </style>
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

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Chọn sản phẩm</label>
                    <div class="col-md-10">
                        <select class="form-control query-product" data-fouc style="min-height:37px">
                            <option value="">Chọn sản phẩm</option>
                        </select>
                    </div>
                </div>

            </fieldset>

        </div>
    </div>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Danh sách sản phẩm</h5>
        </div>
        <div class="card-body">
            <div class="max-height:400px;overflow:auto">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hàng</th>
                                <th>Mã hàng</th>
                                <th>Quy cách</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="cart-table">

                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
</form>


@stop