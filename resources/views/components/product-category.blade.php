<div class="row">
    @foreach($product_list as $product)
    
    <div class="col-md product-category">
        <x-product-card :productitem="$product" />

    </div>

    @endforeach
</div>