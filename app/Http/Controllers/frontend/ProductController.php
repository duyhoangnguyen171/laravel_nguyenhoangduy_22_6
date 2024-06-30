<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //Product All
    public function index(Request $request)
    {
        // Lấy tham số sắp xếp từ request
        $sort_by = $request->input('sort_by', 'default'); // Giá trị mặc định là 'default' nếu không có tham số
        
        // Xử lý các trường hợp sắp xếp
        switch ($sort_by) {
            case 'price_asc':
                $list_product = Product::where('status', '=', 1)
                    ->orderBy('price', 'asc')
                    ->paginate(9);
                break;
            case 'price_desc':
                $list_product = Product::where('status', '=', 1)
                    ->orderBy('price', 'desc')
                    ->paginate(9);
                break;
            default:
                // Sắp xếp theo mặc định, ví dụ: theo thời gian tạo mới nhất
                $list_product = Product::where('status', '=', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
                break;
        }

        return view('frontend.product', compact('list_product'));
    }
    // get list category
    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])
            ->select("id")
            ->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])
                    ->select("id")
                    ->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listcatid;
    }
    //Product Category
    public function category(Request $request, $slug)
    {
        $sort_by = $request->input('sort_by', 'default'); // Giá trị mặc định là 'default' nếu không có tham số
        
        // Lấy danh sách sản phẩm theo danh mục
        $row = Category::where([['slug', '=', $slug], ['status', '=', 1]])->select("id", "name", "slug")->first();
        $listcatid = [];
        if ($row != null) {
            $listcatid = $this->getlistcategoryid($row->id);
        }

        // Xử lý các trường hợp sắp xếp
        switch ($sort_by) {
            case 'price_asc':
                $list_product = Product::where('status', '=', 1)
                    ->whereIn('category_id', $listcatid)
                    ->orderBy('price', 'asc')
                    ->paginate(9);
                break;
            case 'price_desc':
                $list_product = Product::where('status', '=', 1)
                    ->whereIn('category_id', $listcatid)
                    ->orderBy('price', 'desc')
                    ->paginate(9);
                break;
            default:
                // Sắp xếp theo mặc định, ví dụ: theo thời gian tạo mới nhất
                $list_product = Product::where('status', '=', 1)
                    ->whereIn('category_id', $listcatid)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
                break;
        }

        return view('frontend.product_category', compact('list_product', 'row'));
    }
    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();

        $listcatid = $this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->get();
        return view('frontend.product_detail', compact('product', 'list_product'));
    }
  
}
