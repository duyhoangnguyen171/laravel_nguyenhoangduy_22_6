<div class="container mt-3">
    <section class="content">
        <h1 class="text-center">Sản Phẩm Mới</h1>
        <div class="row">
            @foreach($product_list as $productitem)
            <div class="col-md product">
                <x-product-card :productitem="$productitem" />

            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href=""><button class="view-all">Xem tất cả</button></a>
        </div>
    </section>
</div>