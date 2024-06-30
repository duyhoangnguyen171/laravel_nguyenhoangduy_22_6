<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Page;
use App\Models\Post;

class MenuController extends Controller
{
    /**
     * Hiển thị danh sách các tài nguyên.
     */
    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'position', 'link', 'status')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'status')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'status')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'status')
            ->get();
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->orderBy('created_at', 'DESC')
            ->select('id', 'title', 'status')
            ->get();

        return view("backend.menu.index", compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page'));
    }

    /**
     * Hiển thị biểu mẫu để tạo một tài nguyên mới.
     */
    public function create()
    {
        //
    }

    /**
     * Lưu trữ một tài nguyên mới.
     */
    public function store(Request $request)
    {
        $position = $request->position ?? 0; // Gán giá trị mặc định nếu position bị null

        if (isset($request->createCategory)) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/' . $category->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'category';
                        $menu->position = $position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "không";
            }
        }

        if (isset($request->createBrand)) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/' . $brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->position = $position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "không";
            }
        }

        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'chu-de/' . $topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->position = $position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "không";
            }
        }

        if (isset($request->createPage)) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/' . $page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->position = $position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "không";
            }
        }

        if (isset($request->createCustomer)) {
            if (isset($request->name, $request->link)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = 0;
                $menu->parent_id = 0;
                $menu->type = 'customer';
                $menu->position = $position;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = $request->status;
                $menu->save();
                return redirect()->route('admin.menu.index');
            }
        }
    }

    /**
     * Hiển thị tài nguyên cụ thể.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        return view("backend.menu.show", compact("menu"));
    }

    /**
     * Hiển thị biểu mẫu để chỉnh sửa tài nguyên cụ thể.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index');
        }
        $categories = Category::all();
        $brands = Brand::all();
        $topics = Topic::all();
        $pages = Post::where('type', 'page')->get();
        $posts = Post::where('type', 'post')->get();
        $list = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();

        return view('backend.menu.edit', compact('menu', 'list', 'categories', 'brands', 'topics', 'pages', 'posts'));
    }
    /**
     * Cập nhật tài nguyên cụ thể.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index');
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->status = $request->status;
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được cập nhật thành công.');

    }
    public function trash(){
        $list = Menu::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();
        return view('backend.menu.trash', compact('list'));
    }
    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.trash');
    }
    /**
     * Xóa tài nguyên cụ thể.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash');
    }
    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function status($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $menu->status = $menu->status == 1 ? 2 : 1;
            $menu->save();
        }

        return redirect()->route('admin.menu.index');
    }
}