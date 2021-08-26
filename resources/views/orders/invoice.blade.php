@extends('layouts.app')

@section('content')
<div class="card" id="printBox">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">ĐƠN ĐẶT HÀNG</h6>
        <div class="header-elements">
            <!-- <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button> -->
            <button type="button" class="btn btn-light btn-sm ml-3" id="btnPrint"><i class="icon-printer mr-2"></i> IN ĐƠN HÀNG</button>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <img src="/images/logo.jpg" class="mb-3 mt-2" alt="" style="width: 120px;">
                    <ul class="list list-unstyled mb-0">
                        <li>CÔNG TY TNHH SẢN XUẤT VÀ XUẤT KHẨU AN PHÁT</li>
                        <li>Lô B3, KCN Nguyễn Đức Cảnh, phường Trần Hưng Đạo, thành phố Thái Bình</li>
                        <li>0363 864 518</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <div class="text-sm-right">
                        <h4 class="text-primary mb-2 mt-md-2">Mã đơn hàng: {{$order->order_id}}</h4>
                        <ul class="list list-unstyled mb-0">
                            <li>Ngày đặt hàng: <span class="font-weight-semibold">{{$order->created_at->format('d-m-Y H:i')}}</span></li>
                            <li>Ngày thanh toán: <span class="font-weight-semibold">{{date("d-m-Y H:i")}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-wrap">
            <div class="mb-4 mb-md-2">
                <span class="text-muted">Hóa đơn cho:</span>
                <ul class="list list-unstyled mb-0">
                    <li>
                        <h5 class="my-2">{{$order->contact_name}}</h5>
                    </li>
                    <li><span class="font-weight-semibold">{{$order->address}}</span></li>
                    <li>{{$order->note}}</li>
                    <li>{{$order->phone}}</li>
                    <!-- <li><a href="#">rebecca@normandaxis.ltd</a></li> -->
                </ul>
            </div>

            <div class="mb-2 ml-auto">
                <span class="text-muted">Thông tin thanh toán:</span>
                <div class="d-flex flex-wrap wmin-md-400">
                    <ul class="list list-unstyled mb-0">
                        <li>
                            <h5 class="my-2">SỐ TIỀN CẦN THANH TOÁN:</h5>
                        </li>
                        <li>Tên ngân hàng:</li>
                        <li>Chi nhánh:</li>
                        <li>Số tài khoản:</li>
                        <li>Tài khoản người hưởng:</li>
                    </ul>

                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                        <li>
                            <h5 class="font-weight-semibold my-2">{{$order->total}}</h5>
                        </li>
                        <li><span class="font-weight-semibold">Ngân hàng thương mại cổ phần Vietcombank</span></li>
                        <li>Nguyễn Đức Cảnh - TP Thái Bình</li>
                        <li>22177222222</li>
                        <li><span class="font-weight-semibold">CÔNG TY TNHH SẢN XUẤT VÀ XUẤT KHẨU AN PHÁT</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->details as $item)
                <tr>
                    <td>
                        <h6 class="mb-0">{{$item->product_name}}</h6>
                        <!-- <span class="text-muted">One morning, when Gregor Samsa woke from troubled.</span> -->
                    </td>
                    <td>{{$item->quantity}}</td>
                    <td>Hộp</td>
                    <td>{{$item->price}}</td>
                    <td><span class="font-weight-semibold">{{$item->rowtotal}}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="d-md-flex flex-md-wrap">
            <div class="pt-2 mb-3">
                <h6 class="mb-3">Người bán</h6>
                <div class="mb-3">
                    <!-- <img src="../../../../global_assets/images/signature.png" width="150" alt=""> -->
                </div>

            </div>

            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                <h6 class="mb-3">Số tiền cần thanh toán</h6>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Tổng cộng:</th>
                                <td class="text-right">{{$order->total}}</td>
                            </tr>
                            <tr>
                                <th>Thuế VAT: <span class="font-weight-normal">(10%)</span></th>
                                <td class="text-right">$1,750</td>
                            </tr>
                            <tr>
                                <th>Số tiền phải trả:</th>
                                <td class="text-right text-primary">
                                    <h5 class="font-weight-semibold">$8,750</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-3">
                    <button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Gửi hóa đơn qua email</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <span class="text-muted">Cảm ơn bạn đã tin tưởng và ủng hộ sản phẩm của chúng tôi</span>
    </div>
</div>

<script>
    function printData() {
        var divToPrint = document.getElementById("printBox");
        newWin = window.open("");
        newWin.document.write(` <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/admin/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->`);
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('#btnPrint').on('click', function() {
        printData();
    })
</script>
@stop