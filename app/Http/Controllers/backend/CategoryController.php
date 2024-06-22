<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Select * form table where ... order by
        //get(), all() lấy ra nhiều mẫu tin Mảng 2c
        //first(), find($id)
        $list = Category::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'image', 'name', 'slug','status')
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach ($list as $row)
        {
            $htmlparentid .= "<option value='".$row->id."'>".$row->name."</option>";
            $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>Sau: ".$row->name."</option>";
        }
        return view("backend.category.index", compact("list","htmlparentid","htmlsortorder"));
    }

    /**
     * Show the form for creating a new resource.
     */
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Log::info('Dữ liệu request: ', $request->all());

        $category = new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->sort_order=$request->sort_order;

        //upload file
        if($request->hasFile('image'))
        {
            $fileName = date('YmdHis').'.'.$request->image->extension();  
            $request->image->move(public_path('img/categorys/'), $fileName);
            $category->image=$fileName;
        }
       
        
  

        $category->status=$request->status;
        $category->slug=Str::of($request->name)->slug('-');
        $category->created_at=date('Y-m-d H:i:s');
        $category->created_by=Auth::id()??1;// dang nhap


        $category->save();
       return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        return view("backend.category.show",compact("category"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        $list = Category::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","slug","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($category->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($category->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.category.edit",compact("list","htmlparentid","htmlsortorder","category"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        
        if($request->image)
        {
            $exten = $request->file("image")->extension();
            if(in_array($exten, ["png","jpg","jpeg","gif", "webp"])){
                $fileName = $category->slug.".".$exten;
                $request->image->move(public_path('img/categorys'), $fileName);
                $category->image = $fileName;
            }
        }

        $category->slug=Str::of($request->name)->slug('-');
        $category->status = $request->status;
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;

        $category->save();
        return redirect()->route('admin.category.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->delete();

        return redirect()->route('admin.category.trash');
    }
    
    public function status(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        $category->status = ($category->status==1)?2:1;
        $category->updated_at= date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        $category->status = 0;
        $category->updated_at= date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null){
            return redirect()->route('admin.category.index');        
        }
        $category->status = 2;
        $category->updated_at= date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();

        return redirect()->route('admin.category.trash');
    }
    public function trash()
    {
        $list = Category::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","slug","status")
        ->get();
        return view("backend.category.trash",compact("list"));
    }
}
