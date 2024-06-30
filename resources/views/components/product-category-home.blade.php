@foreach($category_list as $cat_row)
<div class="section_product_category my-5">
    <div class="container">
        <h1 class="text-center mb-3 bg-danger p-2 text-white bg-opacity-70">{{$cat_row->name}}</h1>
        <div class="row">
            <div class="col-md">
                <x-product-category :catrow="$cat_row" />
                <div class="row mt-5">
                    <div class="text-center">
                        <a href="{{route('site.product.category',['slug'=>$cat_row->slug])}}"><button class="view-all">Xem tất cả</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach