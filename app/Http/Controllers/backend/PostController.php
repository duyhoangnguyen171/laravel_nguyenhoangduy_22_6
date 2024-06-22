<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status', '!=', 0)
        ->leftJoin('topic','post.topic_id','=','topic.id')
        ->orderBy('post.created_at', 'DESC')
        ->select('post.id', 'post.image', 'post.title','post.type','topic.name as topicname','post.status','post.detail' )
        ->get();

        $htmltopic="";
        foreach($list as $row)
        {       
            $htmltopic.="<option value='".$row->id."'>".$row->name."</option>";
        }
        return view("backend.post.index",compact("list","htmltopic"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $list_topic=Topic::where('status','!=', 0)
        ->orderBy('created_at', 'DESC')
        ->get();
        $list_post=Post::where('status','!=', 0)
        ->orderBy('created_at', 'DESC')
        ->get();
        $htmltopic="";
        $htmltype="";
        foreach($list_topic as $row)
        {       
            $htmltopic.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list_post as $row)
        {       
            $htmltype.="<option value='".$row->id."'>".$row->type."</option>";
        }
        return view("backend.post.create",compact("htmltopic","htmltype"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new post();
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->type = $request->type;

        if($request->image)
        {
            $fileName = date('YmDHis').'.'.$request->image->extension();
            $request->image->move(public_path('img/posts/'), $fileName);
            $post->image = $fileName;
        }
        
        $post->status = $request->status;
        $post->slug=Str::of($request->name)->slug('-');
        $post->created_at=date('Y-m-d H:i:s');
        $post->created_by=Auth::id()??1;

        $post->save();
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');        
        }
        return view("backend.post.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');        
        }
        $list = Post::where('post.status','!=',0)
        ->leftJoin('topic','post.topic_id','=','topic.id')
        ->orderBy('post.created_at', 'DESC')
        ->select('post.id', 'post.image', 'post.title','post.type','topic.name as topicname','post.status','post.detail' )
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($post->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($post->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.post.edit",compact("list","htmlparentid","htmlsortorder","post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');        
        }

        $post->title = $request->title;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;

        $topic = Topic::find($request->topic_id);
        if ($topic) {
            $post->topicname = $topic->name;
        }
        if ($request->hasFile('image')) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $fileName = Str::slug($post->title).'.'.$exten;
                $request->image->move(public_path('img/posts'), $fileName);
                $post->image = $fileName;
            }
        }

        $post->slug = Str::of($request->title)->slug('-');
        $post->status = $request->status;
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1;

        $post->save();
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  
    public function status(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');        
        }
        $post->status = ($post->status==1)?2:1;
        $post->updated_at= date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();

        return redirect()->route('admin.post.index');
    }
    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');        
        }
        $post->status = 0;
        $post->updated_at= date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();

        return redirect()->route('admin.post.index');
    }
    public function trash()
    {
        // dd($request->all());
        $list = Post::where('post.status', '!=', 0)
        ->leftJoin('topic','post.topic_id','=','topic.id')
        ->orderBy('post.created_at', 'DESC')
        ->select('post.id', 'post.image', 'post.title','post.type','topic.name as topicname','post.status','post.detail' )
        ->get();
        return view("backend.post.trash",compact("list"));
    }
    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');        
        }
        $post->status = 2;
        $post->updated_at= date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();


        return redirect()->route('admin.post.trash');
    }
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->delete();

        return redirect()->route('admin.post.trash');
    }
}
