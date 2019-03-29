@extends('layout.master')
@section('title')
完成付款手續
@endsection

@section('content')
    <div class='row justify-content-center'>
        <div class='col-12'>
            <h2 class='text-center'>恭喜您完成付款</h2>
            <h4 class='text-left '>付款明細</h4>
        </div>
    </div>
    <div class='row justify-content-center'>
        <div class='col-12'>
           @if(isset($Cart))               
                <ul class="list-group mt-2">
                    @foreach ($Cart['items'] as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span>{{$item['title']}}</span>    
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
                    總額: {{$Cart['totalPrice']}}
                </div>
            @endif
        </div> 
    </div>
    <div class='row text-center'>
        <div class='col'>
        <a href="{{route('index')}}" class="btn btn-success btn-lg active" role="button" aria-pressed="true">回首頁</a>
        </div>
    </div>
@endsection