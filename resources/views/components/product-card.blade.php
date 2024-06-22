<div class="product-card">
    <a href="{{route('site.product.detail',['slug'=>$product->slug])}}"><img class="img-fluid w-100" src="{{ asset('img/products/'.$product->image)}}" alt="{{$product->image}}" /></a>

    <div class="product-name" >
        <p class="text-dark fw-bold" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="{{route('site.product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></p>
    </div>
    <div class="price">
        <div class="col-8">
            <div class="price_sale">
                <div class="row">
                    @if($product->pricesale==0)
                    <div class="product-price col-12">{{number_format($product->price)}} $ </div>
                    @else
                    <div class="product-price col-8">{{number_format($product->pricesale)}}  <del>{{number_format($product->price)}} $</del> </div>
                    <div class="col-4 text-end col-8">50%</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <button class="buy-button">Buy Now</button>
    <button class="like-button">
        <i class="fa-regular fa-heart"></i>
    </button>

</div>