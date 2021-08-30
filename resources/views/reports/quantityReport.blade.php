@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">BÁO CÁO GIÁ TRỊ TỒN KHO</h5>
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
            Tổng giá trị kho: {{number_format($total, 0, '', ',')}}
        </div>
        <div>
            Tổng số lượng: {{$quantity}}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th>Tồn kho</th>
                        <th>Giá trị kho</th>
                        <th>Tỷ lệ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index=>$item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format($item->quantity * $item->cost_price, 0, '', ',')}}</td>
                        <td>{{($item->quantity * $item->cost_price) / $total * 100}} %</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links('pagination::bootstrap-4') }}
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