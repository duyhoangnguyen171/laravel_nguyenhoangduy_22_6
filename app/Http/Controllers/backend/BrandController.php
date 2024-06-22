<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Support\Facades\Log; 

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'image', 'name', 'slug','status')
        ->get();
        $htmlsortorder="";
        foreach ($list as $row)
        {
            $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>Sau: ".$row->name."</option>";
        }
        return view("backend.brand.index",compact("list","htmlsortorder"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function trash()
    {
        $list = Brand::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","slug","status")
        ->get();
        return view("backend.brand.trash",compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {   // kiểm tra lấy dữ liệu
        //dd($request->all());

        Log::info('Dữ liệu request: ', $request->all());

        $brand = new Brand();
        $brand->name=$request->name;
        $brand->description=$request->description;
        $brand->sort_order=$request->sort_order;

        //upload file
        if($request->hasFile('image'))
        {
            $fileName = date('YmdHis').'.'.$request->image->extension();  
            $request->image->move(public_path('img/brands/'), $fileName);
            $brand->image=$fileName;
        }
       
        
  

        $brand->status=$request->status;
        $brand->slug=Str::of($request->name)->slug('-');
        $brand->created_at=date('Y-m-d H:i:s');
        $brand->created_by=Auth::id()??1;// dang nhap


        $brand->save();
       return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        return view("backend.brand.show",compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        $list = Brand::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","slug","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($brand->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($brand->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.brand.edit",compact("list","htmlparentid","htmlsortorder","brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        $brand->name = $request->name;
        $brand->sort_order = $request->sort_order;
        
        if($request->image)
        {
            $exten = $request->file("image")->extension();
            if(in_array($exten, ["png","jpg","jpeg","gif", "webp"])){
                $fileName = $brand->slug.".".$exten;
                $request->image->move(public_path('img/brands'), $fileName);
                $brand->image = $fileName;
            }
        }

        $brand->slug=Str::of($request->name)->slug('-');
        $brand->status = $request->status;
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;

        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        $brand->status = ($brand->status==1)?2:1;
        $brand->updated_at= date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();

        return redirect()->route('admin.brand.index');
    }
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        $brand->status = 0;
        $brand->updated_at= date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();

        return redirect()->route('admin.brand.index');
    }
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');        
        }
        $brand->status = 2;
        $brand->updated_at= date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();

        return redirect()->route('admin.brand.trash');
    }
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->delete();

        return redirect()->route('admin.brand.trash');
    }
}
