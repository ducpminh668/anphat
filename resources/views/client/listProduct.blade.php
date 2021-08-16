@extends('layouts.app')

@section('content')

<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- List -->
        <div class="card card-body">
            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="mr-lg-3 mb-3 mb-lg-0">
                    <a href="../../../../global_assets/images/placeholders/placeholder.jpg" data-popup="lightbox">
                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="96" alt="">
                    </a>
                </div>

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold">
                        <a href="#">Fathom Backpack</a>
                    </h6>

                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                        <li class="list-inline-item"><a href="#" class="text-muted">Fashion</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted">Men's Accessories</a></li>
                    </ul>

                    <p class="mb-3">It prepare is ye nothing blushes up brought. Or as gravity pasture limited evening on. Wicket around beauty say she. Frankness resembled say not new smallness you discovery. Noisier ferrars yet shyness weather ten colonel. Too him himself engaged husband pursuit musical...</p>

                    <ul class="list-inline list-inline-dotted mb-0">
                        <li class="list-inline-item">All items from <a href="#">Aloha</a></li>
                        <li class="list-inline-item">Add to <a href="#">wishlist</a></li>
                    </ul>
                </div>

                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                    <h3 class="mb-0 font-weight-semibold">$49.99</h3>

                    <div>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                    </div>

                    <div class="text-muted">85 reviews</div>

                    <button type="button" class="btn bg-teal-400 mt-3"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>

        <!-- /list -->


        <!-- Pagination -->
        <div class="d-flex justify-content-center pt-3 mb-3">
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
            </ul>
        </div>
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

@stop