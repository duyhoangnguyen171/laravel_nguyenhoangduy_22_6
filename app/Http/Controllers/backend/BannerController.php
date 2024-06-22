<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Support\Facades\Log; 


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'image','name','position','link','status')
        ->get();
        $htmlpostion="";
        $htmlsortorder="";
        foreach ($list as $row)
        {
            $htmlsortorder .= "<option value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }
    
       return view("backend.banner.index",compact('list','htmlsortorder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        // kiểm tra lấy dữ liệu
        //dd($request->all());
        Log::info('Dữ liệu request: ', $request->all());

        $banner = new Banner();
        $banner->name=$request->name;
        $banner->position=$request->position;
        $banner->description=$request->description;
        $banner->link=$request->link;
        $banner->sort_order=$request->sort_order;
        

        //upload file
        if($request->hasFile('image'))
        {
            $fileName = date('YmdHis').'.'.$request->image->extension();  
            $request->image->move(public_path('img/banners/'), $fileName);
            $banner->image=$fileName;
        }
       
        
  

        $banner->status=$request->status;
        $banner->created_at=date('Y-m-d H:i:s');
        $banner->created_by=Auth::id()??1;// dang nhap


        $banner->save();
       return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        return view("backend.banner.show",compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        $list = Banner::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($banner->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($banner->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.banner.edit",compact("list","htmlparentid","htmlsortorder","banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->sort_order = $request->sort_order;
        $banner->link = $request->link;
        $banner->position = $request->position;
        
        if($request->image)
        {
            $exten = $request->file("image")->extension();
            if(in_array($exten, ["png","jpg","jpeg","gif", "webp"])){
                $fileName = $banner->slug.".".$exten;
                $request->image->move(public_path('img/banners'), $fileName);
                $banner->image = $fileName;
            }
        }

        $banner->status = $request->status;
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;

        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function status(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        $banner->status = ($banner->status==1)?2:1;
        $banner->updated_at= date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        $banner->status = 0;
        $banner->updated_at= date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }
    public function trash()
    {
        $list = Banner::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","image","name","status")
        ->get();
        return view("backend.banner.trash",compact("list"));
    }
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');        
        }
        $banner->status = 2;
        $banner->updated_at= date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();

        return redirect()->route('admin.banner.trash');
    }
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();

        return redirect()->route('admin.banner.trash');
    }
}
