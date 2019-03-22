@extends('layout.master')
@section('title')
付款資料填寫
@endsection
@section('content')
    <form>
        <div class='form-row justify-content-center mb-4 mt-4'>
                <h1>請填寫付款資料</h1>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">姓名</label>
                <input type="name" class="form-control" id="inputName" placeholder="請輸入您的姓名">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">地址</label>
                <input type="address" class="form-control" id="inputAddress" placeholder="請輸入您的所在地址">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCardName">卡片持有人</label>
            <input type="text" class="form-control" id="inputCardName" placeholder="請輸入卡片持有人姓名">
        </div>
        <div class="form-group">
            <label for="inputCardNum">卡號</label>
            <input type="text" class="form-control" id="inputCardNum">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputMonth">有效月份:</label>
                <input type="text" class="form-control" id="inputMonth">
            </div>
            <div class="form-group col-md-6">
            <label for="inputYear">有效月年份:</label>
                <input type="text" class="form-control" id="inputYear">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputCvc">驗證碼</label>
                <input type="text" class="form-control" id="inputCvc">
            </div>
        </div>
        <div class="form-row  mt-3 mb-3">
            @if(isset($total))
                <h3 style='color:red'>總金額:NT${{$total}}</h3>
            @endif
        </div>
        <div class="form-row justify-content-center">
            <button type="submit" class="btn btn-primary">付款</button>
        </div>  
    </form>

@endsection