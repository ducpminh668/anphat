@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Cấu hình giá cho sản phẩm: {{$product->name}}</h5>

    </div>
    <div class="card-body">
        <form action="/products/{{$product->id}}/price-set" method="post">
            @csrf
            @if(count($configPrice) > 0)
            @foreach($configPrice as $index=>$item)
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Giá bán {{$item->name}}</label>
                <div class="col-md-5">
                    <input name="prices[]" type="text" placeholder="Nhập giá bán" class="form-control" required value="{{$item->price}}">
                    @error('prices.'.$index)
                    <span class="form-text text-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" value="{{$item->name}}" class="form-control" readonly>
                    <input type="hidden" value="{{$item->group_id}}" name="groups[]">
                    @error('groups')
                    <span class="form-text text-warning">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endforeach
            @else
            @foreach($groups as $index=>$item)
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Giá bán {{$item->name}}</label>
                <div class="col-md-5">
                    <input name="prices[]" type="text" placeholder="Nhập giá bán" class="form-control" required value="{{$product->sell_price}}">
                    @error('prices.'.$index)
                    <span class="form-text text-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" value="{{$item->name}}" class="form-control" readonly>
                    <input type="hidden" value="{{$item->id}}" name="groups[]">
                    @error('groups')
                    <span class="form-text text-warning">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endforeach
            @endif



            <div class="row">
                <button class="btn btn-primary" type="submit">Hoàn thành</button>
            </div>
        </form>
    </div>
</div>
@stop