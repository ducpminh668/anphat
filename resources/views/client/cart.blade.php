@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">GIỎ HÀNG</h5>
        <div class="header-elements">
            <div class="list-icons">
                <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                <a class="list-icons-item" data-action="reload"></a>
                <!-- <a class="list-icons-item" data-action="remove"></a> -->
            </div>
        </div>
    </div>
    <form action="/submitCart" method="post" onsubmit="return checkCart()">
        @csrf
        <div class="card-body">
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <input name="name" id="name" type="text" placeholder="Tên khách hàng" value="{{auth()->user()->name}}" class="form-control" required="">
                        @if(auth()->user()->customer)
                        <input name="customer_id" id="customer_id" type="hidden" value="{{auth()->user()->customer->id}}" class="form-control" required="">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Số điện thoại</label>
                    <div class="col-md-10">
                        <input name="phone" id="phone" type="text" placeholder="Số điện thoại" value="{{auth()->user()->phone}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Địa chỉ</label>
                    <div class="col-md-10">
                        @if(auth()->user()->customer)
                        <input name="address" id="address" type="text" placeholder="Địa chỉ" value="{{auth()->user()->customer->address}}" class="form-control">
                        @else
                        <input name="address" id="address" type="text" placeholder="Địa chỉ" value="" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Ghi chú</label>
                    <div class="col-md-10">
                        <textarea name="note" class="form-control" rows="5" placeholder="Nhập ghi chú"></textarea>
                    </div>
                </div>
                <input type="hidden" name="cart" id="cart-field">
            </fieldset>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="cart-table">

                    </tbody>
                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
                </div>
            </div>
        </div>


    </form>
</div>
<script>
    function checkCart() {
        let cart = JSON.parse(localStorage.getItem('cart'));
        if (cart && cart.items.length > 0) {
            $('#cart-field').val(JSON.stringify(cart));
            return true;
        }
        return false
    }

    function renderCart() {
        let cart = JSON.parse(localStorage.getItem('cart'));
        if (cart && cart.items.length > 0) {
            let content = ''
            cart.items.map((item, index) => {
                content += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.barcode}</td>
                    <td>${item.quantity}</td>
                    <td>${formatCash(item.price.toString())}</td>
                    <td>${formatCash(item.rowtotal.toString())}</td>
                </tr>
                `
            })
            content += `<tr>
                <td colspan="5"><strong>Tổng tiền: ${formatCash(cart.total.toString())}</strong></td>
            </tr>`;
            $('.cart-table').html(content)
        } else {
            let content = `<tr>
                <td colspan="5"><strong>Không có sản phẩm nào trong giỏ hàng</strong></td>
            </tr>`;
        }
    }

    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + ',')) + prev
        })
    }

    renderCart()
</script>
@stop