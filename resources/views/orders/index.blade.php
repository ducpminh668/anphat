@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">DANH SÁCH ĐƠN ĐẶT HÀNG</h5>
        <div class="header-elements">
            <div class="list-icons">
                <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                <a class="list-icons-item" data-action="reload"></a>
                <!-- <a class="list-icons-item" data-action="remove"></a> -->
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index=>$item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>
                            <a href="/invoice/{{$item->id}}">
                                {{$item->order_id}}
                            </a>
                        </td>

                        <td>
                            {{$item->contact_name}}
                        </td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{number_format($item->total_due, 0, '', ',')}}</td>
                        <td>{{$item->note}}</td>
                        <td><span class="badge badge-warning">Chờ xử lý</span></td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(22px, 0px, 0px);">
                                        <a href="/orders/{{$item->id}}/edit" class="dropdown-item"><i class="icon-pencil"></i> Sửa đơn hàng</a>
                                        <a href="/orders/{{$item->id}}/cancel" class="dropdown-item"><i class="icon-diff-removed"></i> Hủy đơn hàng</a>
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


</div>

<script>
    $('.delete-customer').click(function(e) {
        if (confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
            $(this).next().submit();
        }
    });
</script>
@stop