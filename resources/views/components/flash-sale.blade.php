<div class="container mt-3">
    <section class="content h-100">
        <h1 class="text-center bg-danger p-2 text-white bg-opacity-50">Sản Phẩm Flash Sale</h1>
        <div class="row">
            @foreach($product_list as $productitem)
            <div class="col-md product">
                <x-product-card :productitem="$productitem" />

            </div>
            @endforeach
        </div>
        <div class="text-center mb-5">
            <a href=""><button class="view-all">Xem tất cả</button></a>
        </div>
    </section>
</div>