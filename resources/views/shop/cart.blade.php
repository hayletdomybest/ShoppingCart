@extends('layout.master')
@section('title')
我的購物車
@endsection
@section('content')
    @if(isset($items))
    <ul class="list-group mt-5">
        
        @foreach ($items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <span>{{$item['item']->title}}</span>    
                </div>
                <div>
                    <span class='badge badge-danger mr-3'>單價: {{$item['price']}}</span>
                    <span class='badge badge-success mr-3'>金額: {{$item['price']*$item['qty']}}</span>
                    <span class="badge badge-primary badge-pill">
                        數量: {{$item['qty']}}
                    </span>
                    
                </div>    
            </li>     
        @endforeach
    </ul>
    <div class="alert alert-success mt-5" role="alert">
            總額: {{$totalPrice}}
    </div>
    <div class='row justify-content-center'>
        <a href={{route('checkoutForm',['total'=>$totalPrice])}} type="button" class="btn btn-success">付款</a>
    </div>
    
    @else
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <h3>無購買任何商品</h3>
            </div>
        </div>      
    @endif
@endsection