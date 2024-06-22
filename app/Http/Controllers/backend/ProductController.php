<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->orderBy('product.created_at', 'DESC')
            ->select('product.id', 'product.image', 'product.name as productname', 'category.name as categoryname', 'brand.name as brandname', 'product.status')
            ->get();

        return view("backend.product.index", compact('list'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // kiểm tra lấy dữ liệu

        $list_product = product::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlproductid = "";
        $htmlbrandid = "";
        foreach ($list_product as $row) {
            $htmlproductid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
        foreach ($list_brand as $row) {
            $htmlbrandid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
        return view('backend.product.create', compact("htmlproductid", "htmlbrandid"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->pricesale = $request->pricesale;
        $product->product_id = $request->product_id;
        $product->brand_id = $request->brand_id;

        if ($request->image) {
            $fileName = date('YmDHis') . '.' . $request->image->extension();
            $request->image->move(public_path('img/products/'), $fileName);
            $product->image = $fileName;
        }

        $product->status = $request->status;
        $product->slug = Str::of($request->name)->slug('-');
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("backend.product.show");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null){
            return redirect()->route('admin.product.index');        
        }
        $product->status = ($product->status==1)?2:1;
        $product->updated_at= date('Y-m-d H:i:s');
        $product->updated_by=Auth::id()??1;
        $product->save();

        return redirect()->route('admin.product.index');
    }
}
