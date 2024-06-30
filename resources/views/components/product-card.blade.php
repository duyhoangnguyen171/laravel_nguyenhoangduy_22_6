<div class="product-card">
    <a href="{{ route('site.product.detail',['slug'=>$product->slug]) }}"><img class="img-fluid w-60" src="{{ asset('img/products/'.$product->image)}}" alt="{{$product->image}}" /></a>

    <div class="product-name">
        <p class="text-dark fw-bold" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="{{ route('site.product.detail',['slug'=> $product->slug]) }}">{{$product->name}}</a></p>
    </div>
    <div class="price">
        <div class="price_sale">
            <div class="row">
                @if($product->pricesale>0 && $product->price<$product->pricesale)
                    <div class="product-price col-9">{{number_format($product->price)}} VND
                        <del class="my-3">{{number_format($product->pricesale)}} VND</del>
                    </div>
                    @else
                    <div class="product-price col-12">{{number_format($product->price)}} VND</div>
                    @endif
            </div>
        </div>
    </div>
    <a href="{{ route('site.product.detail',['slug'=>$product->slug]) }}"><button class="buy-button">Buy Now</button></a>
    
    <button class="like-button">
        <i class="fa-regular fa-heart"></i>
    </button>

</div>