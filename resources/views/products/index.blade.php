@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">DANH SÁCH SẢN PHẨM</h5>
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
            <a href="/products/create" class="btn btn-primary">Thêm mới sản phẩm</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã Barcode</th>
                    <th>Đơn vị tính</th>
                    <th>Nơi sản xuất</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tồn kho</th>
                    <th>Giá vốn</th>
                    <th>Giá bán</th>
                    <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index=>$item)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>{{$item->barcode}}</td>
                    <td>{{$item->dvt}}</td>
                    <td>{{$item->manufacturer}}</td>
                    <td><img src="{{asset($item->thumbnail)}}" alt="" width="64" height="auto"></td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->cost_price, 0, '', ',')}}</td>
                    <td>{{number_format($item->sell_price, 0, '', ',')}}</td>

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(22px, 0px, 0px);">
                                    <a href="/products/{{$item->id}}/edit" class="dropdown-item"><i class="icon-pencil"></i> Sửa sản phẩm</a>
                                    <a href="" class="dropdown-item text-danger delete-product"><i class="icon-trash"></i> Xóa sản phẩm</a>
                                    <!-- <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> -->
                                    <form method="POST" action="{{ route('products.destroy', $item->id) }}" style="display: none;">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
                                    </form>
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

<script>
    $('.delete-product').click(function(e) {
        if (confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
            $(this).next().submit();
        }
    });
</script>
@stop