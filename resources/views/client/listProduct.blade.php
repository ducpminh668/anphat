@extends('layouts.app')

@section('content')

<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- List -->
        @foreach($products as $product)
        <div class="card card-body">
            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <!-- <div class="mr-lg-3 mb-3 mb-lg-0">
                    <a href="../../../../global_assets/images/placeholders/placeholder.jpg" data-popup="lightbox">
                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="96" alt="">
                    </a>
                </div> -->

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold">
                        <a href="#">{{$product->name}}</a>
                    </h6>

                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                        <li class="list-inline-item"><a href="#" class="text-muted">{{$product->barcode}}</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted">{{$product->short_desc}}</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted">Tồn: {{$product->quantity}}</a></li>
                    </ul>

                    <img src="{{asset($product->thumbnail)}}" height="80" alt="">


                </div>

                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                    @if($product->group_id)
                    <h3 class="mb-0 font-weight-semibold">{{number_format($product->price, 0, '', ',')}}</h3>
                    <button type="button" class="btn bg-teal-400 mt-3" onclick="addToCart('{{$product->pid}}', '{{$product->price}}', '{{asset($product->thumbnail)}}', '{{$product->name}}', '{{$product->cost_price}}', '{{$product->barcode}}', `{{$product->short_desc}}`)"><i class="icon-cart-add mr-2"></i> Thêm giỏ hàng</button>
                    @else
                    <h3 class="mb-0 font-weight-semibold">{{number_format($product->sell_price, 0, '', ',')}}</h3>
                    <button type="button" class="btn bg-teal-400 mt-3" onclick="addToCart('{{$product->pid}}', '{{$product->sell_price}}', '{{asset($product->thumbnail)}}','{{$product->name}}', '{{$product->cost_price}}', '{{$product->barcode}}', `{{$product->short_desc}}`)"><i class="icon-cart-add mr-2"></i> Thêm giỏ hàng</button>
                    @endif
                    <!-- <div>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                    </div> -->

                    <!-- <div class="text-muted">85 reviews</div> -->
                </div>
            </div>
        </div>
        @endforeach
        <!-- /list -->


        <!-- Pagination -->
        <!-- <div class="d-flex justify-content-center pt-3 mb-3">
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
            </ul>
        </div> -->

        {{ $products->links('pagination::bootstrap-4') }}
        <!-- /pagination -->

    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Categories -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Tìm kiếm</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="search" class="form-control" placeholder="Nhập tên hoặc sku">
                            <div class="form-control-feedback">
                                <i class="icon-search4 font-size-base text-muted"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-blue btn-block">Tìm kiếm</button>
                    </form>
                </div>


            </div>
            <!-- /categories -->


        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>

<script>
    function addToCart(id, price, thumbnail, name, cost_price, barcode, short_desc) {
        let cart = JSON.parse(localStorage.getItem('cart')) ?? {
            items: [],
            total: 0,
            quantity: 0
        };
        price = parseInt(price);

        let item = cart.items.find(item => item.id == id);
        if (item) {
            item.quantity += 1
            item.rowtotal += price
        } else {
            cart.items.push({
                id,
                price,
                quantity: 1,
                thumbnail,
                name,
                rowtotal: price,
                cost_price,
                product_id: id,
                barcode: barcode
            })
        }
        cart.quantity += 1;
        cart.total += price;


        localStorage.setItem('cart', JSON.stringify(cart))
        renderCart()
    }
</script>

@stop