@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">54,390</h3>
                    <span class="text-uppercase font-size-xs">Khách hàng mới</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bubbles4 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">389,438</h3>
                    <span class="text-uppercase font-size-xs">Tổng đơn hàng trong tháng</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bag icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">652,549</h3>
                    <span class="text-uppercase font-size-xs">Doanh thu tháng</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">245,382</h3>
                    <span class="text-uppercase font-size-xs">Lợi nhuận ròng</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection