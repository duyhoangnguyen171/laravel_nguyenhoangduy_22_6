<div class="container mt-3">
    <section class="content h-100">
        <h1 class="text-center mb-4 bg-danger p-2 text-white bg-opacity-25">Sản Phẩm Mới</h1>
        <div class="row">
            @foreach($product_list as $productitem)
            <div class="col-md-3 product">
                <x-product-card :productitem="$productitem" />

            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href=""><button class="view-all">Xem tất cả</button></a>
        </div>
    </section>
</div>