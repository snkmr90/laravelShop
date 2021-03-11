@extends('layouts.app')
@section('head')
@endsection('head')
@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')
<div class="row">
    @if(isset($products) && count($products)!=0)
    @foreach($products as $product)
    <div class="col-sm-6 col-md-4 col-xs-6 col-lg-3 col-xl-3 col-xs-6 mb-3">
        <div class="card">
            <img src="{{$product->product_image.'/600x400'}}" class="card-img-top imgloader" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->product_name}}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($product->product_description, 70, $end='...') }}</p>
                <p> {{ Config::get('constants.currency') .' '.$product->product_price}}</p>
                <a href="{{route('cart.addtocart',$product->id)}}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="alert alert-info col-md-12" role="alert">
        No product available at this time !
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
$('document').ready(function(){
    $('.toast').toast('show');
    
})
</script>
@endsection