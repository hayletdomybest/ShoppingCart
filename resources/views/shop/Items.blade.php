@if(isset($products))
    @foreach ($products->chunk(3) as $productchunk)
    <div class="row mt-4">
        @foreach ($productchunk as $product)
            <div class="col-sm-6 col-md-4">
                <div class="img-thumbnail">
                    <img src="{{$product->imagePath}}" alt="" class='mx-auto d-block'>
                    <div class="caption">
                        <h3>{{$product->title}}</h3>
                        <p>{{$product->description}}</p>
                        <div class='row justify-content-end'>
                            <div class='price col-12'>${{$product->price}}</div>
                            <div class='col-auto ml-auto px-1'>
                            <a href="{{route('shop.add',['id' => $product->id])}}" class="btn btn-success" role="button">加入購物車</a>
                            </div>
                            <div class='col-auto pl-0 pr-3'>
                                <a href="#" class="btn btn-primary" role="button">立即購買</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach
@endif
