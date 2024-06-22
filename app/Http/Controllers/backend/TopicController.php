<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTopicRequest;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $list = Topic::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'name','slug','status')
        ->get();
        $htmlsortorder="";
        foreach ($list as $row)
        {
            $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>Sau: ".$row->name."</option>";
        }
        return view("backend.topic.index",compact("list","htmlsortorder"));
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
    public function store(StoreTopicRequest $request)
    {
        Log::info('Dữ liệu request: ', $request->all());

        $topic = new Topic();
        $topic->name=$request->name;
        $topic->description=$request->description;
        $topic->sort_order=$request->sort_order;

        //upload file
        // if($request->hasFile('image'))
        // {
        //     $fileName = date('YmdHis').'.'.$request->image->extension();  
        //     $request->image->move(public_path('img/topics/'), $fileName);
        //     $topic->image=$fileName;
        // }
       
        
  

        $topic->status=$request->status;
        $topic->slug=Str::of($request->name)->slug('-');
        $topic->created_at=date('Y-m-d H:i:s');
        $topic->created_by=Auth::id()??1;// dang nhap


        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        return view("backend.topic.show",compact("topic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        $list = Topic::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","slug","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($topic->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($topic->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.topic.edit",compact("list","htmlparentid","htmlsortorder","topic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        
       

        $topic->slug=Str::of($request->name)->slug('-');
        $topic->status = $request->status;
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;

        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();

        return redirect()->route('admin.topic.trash');
    }
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        $topic->status = ($topic->status==1)?2:1;
        $topic->updated_at= date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();

        return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        $topic->status = 0;
        $topic->updated_at= date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();

        return redirect()->route('admin.topic.index');
    }
    public function trash()
    {
        $list = Topic::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","slug","status")
        ->get();
        return view("backend.topic.trash",compact("list"));
    }
    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null){
            return redirect()->route('admin.topic.index');        
        }
        $topic->status = 2;
        $topic->updated_at= date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();

        return redirect()->route('admin.topic.trash');
    }
    

}
