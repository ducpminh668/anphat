@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Thêm mới sản phẩm</h5>

    </div>

    <div class="card-body">
        <form action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-md-10">
                        <input name="name" id="product_name" type="text" placeholder="Tên sản phẩm" class="form-control" required>
                        @error('name')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Nơi sản xuất</label>
                    <div class="col-md-10">
                        <input name="manufacturer" id="manufacturer" type="text" placeholder="Nơi sản xuất" class="form-control">
                        <!-- <span class="form-text text-warning">Here goes your name</span> -->
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Mã Barcode</label>
                    <div class="col-md-10">
                        <input name="barcode" id="barcode" type="text" placeholder="Mã barcode" class="form-control">
                        <!-- <span class="form-text text-warning">Here goes your name</span> -->
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Giá bán lẻ</label>
                    <div class="col-md-10">
                        <input name="sell_price" id="sell_price" type="text" placeholder="Giá bán" class="form-control" required>
                        @error('sell_price')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"><label class="col-md-2 col-form-label">Ảnh sản phẩm</label>
                    <div class="col-md-10">
                        <input name="thumbnail" id="thumbnail" type="file" class="form-control" required>
                        @error('thumbnail')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
        </form>
    </div>
</div>
@stop