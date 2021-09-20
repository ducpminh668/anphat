@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">BIÊN LAI THU TIỀN HÓA ĐƠN {{$order->order_id}}</h5>
    </div>

    <div class="card-body">
        <form action="/orders/{{$order->id}}/partial" method="post">
            @csrf
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <input value="{{$order->contact_name}}" type="text" placeholder="Tên người dùng" class="form-control" readonly>
                        @error('name')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Số điện thoại</label>
                    <div class="col-md-10">
                        <input value="{{$order->phone}}" type="text" placeholder="Số điện thoại" class="form-control" readonly>
                        @error('phone')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Tổng tiền hóa đơn</label>
                    <div class="col-md-10">
                        <input value="{{$order->total_due}}" id="total_due" type="text" placeholder="" class="form-control" readonly>
                        @error('email')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Số tiền đã thanh toán</label>
                    <div class="col-md-10">
                        <input value="{{$daTT}}" id="total_tt" type="text" placeholder="" class="form-control" readonly>
                        @error('email')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
               
             
                <div class="form-group row"><label class="col-md-2 col-form-label">Thu</label>
                    <div class="col-md-10">
                        <input name="price" id="price" type="number" placeholder="0" class="form-control" max="{{$order->total_due}}">
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Nợ</label>
                    <div class="col-md-10">
                        <input name="price2" id="price2" type="number" placeholder="0" value="{{$order->total_due - $daTT}}" class="form-control" readonly>
                    </div>
                </div>
            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('#price').keyup(function() {
        let total_due = parseInt($('#total_due').val())
        let total_tt = parseInt($('#total_tt').val())
        let price = parseInt($(this).val());
        let debt = total_due - total_tt -  price;
        $('#price2').val(debt);
    })
</script>
@stop