@extends('layouts.app')
@section('head')
@endsection('head')
@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')
<div class="row">
    <table class="table-striped table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Qty</th>
                <th>Product Unit Price</th>
                <th>Product Total Price</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($cartItems) && count($cartItems)!=0)
            @php $grandTotal=0 @endphp
            @foreach($cartItems as $k=>$cartItem)
            <tr>
                <td>{{$cartItem['name']}}
                    @if(session()->has('stockError'.$k))
                    <div class="text-white bg-danger" role="alert">
                        {{session()->get('stockError'.$k)}}
                    </div>
                    @endif
                </td>
                <td>
                    {{$cartItem['quantity']}}
                    <form class="d-inline" method="POST" action="{{route('cart.updatecart',$k)}}">
                        @csrf
                        <input class="pr-0 pl-0 w-25 col-sm-2" value="{{ (old('quantity')!='') ? old('quantity'):1 }}" type="number" id="quantity" name="quantity" min="1">
                        <button class="btn fa fa-refresh" type="submit" value="update"></button>
                    </form>
                    <a href="{{route('cart.delete',$k)}}" class="fa fa-trash"></a>
                </td>
                <td>{{ Config::get('constants.currency') .' '. $cartItem['price']}}</td>
                <td>
                    {{ Config::get('constants.currency') .' '. ($cartItem['price']) * ($cartItem['quantity']) }}
                    @php $grandTotal += ($cartItem['price']) * ($cartItem['quantity']) @endphp
                </td>
            </tr>
            @endforeach
            <tr>
                <td class="text-right font-weight-bold" colspan="3">Grand Total</td>
                <td>{{ Config::get('constants.currency') .' '. $grandTotal}}</td>
            </tr>
            @else
            <tr>
            <td colspan="4">
                <div class="col-md-12 text-danger" role="alert">
                    No product available at this time !
                </div>
            </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('document').ready(function() {
        $('.toast').toast('show');

    })
</script>
@endsection