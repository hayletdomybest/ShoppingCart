@extends('layout.master')
@section('title')
    我的購物車
@endsection
@section('content')
    <div class='row justify-content-center'>
        <div class=" col-md-4 col-md-offset-4">
            <h1>商品上架</h1>
            <form action="{{route('shop.Upload.submit')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class='form-group'>
                    <label for="image">選擇圖片</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class='form-group'>
                    <label for="title">主題</label>
                    <input type="text" name="title" id="title" class='form-control'>
                </div>
                <div class='form-group'>
                    <label for="price">價格</label>
                    <input type="text" name="price" id="price" class='form-control'>
                </div>
                <div class='form-group'>
                    <label for="description">商品描述</label>
                    <input type="text" name="description" id="description" class='form-control'>
                </div>
                <div class='form-group'>
                    <input type="submit" value="提交" class='btn btn-primary'>
                </div>
                @if(Session::has('errors'))
                    {{Session::get('errors')}}
                @endif
            </form>
        </div>
    </div>
@endsection
