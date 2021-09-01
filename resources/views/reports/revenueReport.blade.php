@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">BÁO CÁO DOANH THU</h5>
        <div class="header-elements">
            <div class="list-icons">
                <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                <a class="list-icons-item" data-action="reload"></a>
                <!-- <a class="list-icons-item" data-action="remove"></a> -->
            </div>
        </div>
    </div>

    <div class="card-body">
        <div>
            Ngày lập: {{date('d/m/Y')}}
        </div>
        <div>
            Tổng doanh thu: {{number_format($sumRevenue, 0, '', ',')}}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Gía trị đơn hàng</th>
                        <!-- <th>Tỷ lệ</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->contact_name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{number_format($item->total_due, 0, '', ',')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


</div>

<script>
    $('.delete-product').click(function(e) {
        if (confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
            $(this).next().submit();
        }
    });
</script>
@stop