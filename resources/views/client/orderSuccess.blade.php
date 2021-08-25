@extends('layouts.app')

@section('content')
<div>
    Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ gọi lại cho bạn sớm nhất có thể.
</div>

<script>
    if ('${{$removeCart}}') {
        localStorage.removeItem('cart')
    }
</script>
@stop