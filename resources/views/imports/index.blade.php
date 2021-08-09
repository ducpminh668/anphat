@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">DANH SÁCH PHIẾU NHẬP KHO</h5>
        <div class="header-elements">
            <div class="list-icons">
                <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                <a class="list-icons-item" data-action="reload"></a>
                <!-- <a class="list-icons-item" data-action="remove"></a> -->
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Thêm mới</button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-74px, -183px, 0px);">
                <a href="/imports/create" class="dropdown-item"><i class="icon-download7"></i> Nhập kho</a>
                <a href="#" class="dropdown-item"><i class="icon-screen-full"></i> Nhập từ excel</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID / Ngày</th>
                    <th>SL Sản phẩm</th>
                    <th>Tổng số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Người tạo</th>
                    <th>Ghi chú</th>
                    <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($im as $item)
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modal_{{$item->id}}" class="text-danger">{{$item->code}}</a> <br />
                        {{$item->created_at->format('d-m-Y')}}
                        <div id="modal_{{$item->id}}" class="modal fade" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$item->code}}</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <h6 class="font-weight-semibold">Thông tin</h6>

                                        <hr>
                                        <!-- detail table  -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th> <i class="icon-package"></i> Sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá</th>
                                                        <th>Tổng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($item->details as $index=>$detail)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{$detail->product_id}}</td>
                                                        <td>{{$detail->quantity}}</td>
                                                        <td>{{number_format($detail->price, 0, '', ',')}}</td>
                                                        <td>{{number_format($detail->quantity * $detail->price, 0, '', ',') }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- detail table  -->

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Thoát</button>
                                        <!-- <button type="button" class="btn bg-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><a href="#">{{$item->product_count}}</a></td>
                    <td>{{$item->quantity}}</td>
                    <td>{{ number_format($item->total, 0, '', ',')}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->note}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(22px, 0px, 0px);">
                                    <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> In phiếu</a>
                                    <a href="#" class="dropdown-item text-danger"><i class="icon-trash"></i> Xóa phiếu</a>
                                    <!-- <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> -->
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop