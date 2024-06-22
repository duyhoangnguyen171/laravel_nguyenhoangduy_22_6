<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'image', 'name','username', 'phone','email','users.roles','status')
        ->get();
        return view("backend.user.index",compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_user = User::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view("backend.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //  dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->address = $request->address;
        $user->remember_token = $request->remember_token;

        // if($request->image)
        // {
        //     $fileName = date('YmDHis').'.'.$request->image->extension();
        //     $request->image->move(public_path('img/users/'), $fileName);
        //     $user->image = $fileName;
        // }
        
        $user->status = $request->status;
        $user->created_at=date('Y-m-d H:i:s');
        $user->created_by=Auth::id()??1;

        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        return view("backend.user.show",compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        $list = user::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","image","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($user->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($user->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.user.edit",compact("list","htmlparentid","htmlsortorder","user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->remember_token= $request->remember_token	;

        $user->status = $request->status;
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;

        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        $user->status = ($user->status==1)?2:1;
        $user->updated_at= date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();

        return redirect()->route('admin.user.index');
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        $user->status = 0;
        $user->updated_at= date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();

        return redirect()->route('admin.user.index');
    }
    public function trash()
    {
        $list = User::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","image","phone","username","roles","email","status")
        ->get();
        return view("backend.user.trash",compact("list"));
    }
    public function restore(string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');        
        }
        $user->status = 2;
        $user->updated_at= date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();

        return redirect()->route('admin.user.trash');
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->delete();

        return redirect()->route('admin.user.trash');
    }
}
