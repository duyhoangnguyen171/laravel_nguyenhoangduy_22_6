<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Log; 
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'name', 'phone', 'email','title','status')
        ->get();
        return view("backend.contact.index",compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact.contact_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        return view("backend.contact.show",compact("contact"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        $list = Contact::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","status")
        ->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $row)
        if($contact->position == $row->position){
            $htmlparentid.="<option selected value='".$row->id."'>".$row->name."</option>";
        }
        else{
            $htmlparentid.="<option value='".$row->id."'>".$row->name."</option>";
        }
        foreach($list as $row)
        if($contact->sort_order == $row->sort_order){
            $htmlsortorder.="<option value='".($row->sort_order-1)."'>Sau: ".$row->name."</option>";
        }
        else{
            $htmlsortorder.="<option selected value='".($row->sort_order+1)."'>Sau: ".$row->name."</option>";
        }


        return view("backend.contact.edit",compact("list","htmlparentid","htmlsortorder","contact"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        $contact->name = $request->name;
        $contact->user_id = $request->user_id;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        

        $contact->status = $request->status;
        $contact->updated_at=date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id()??1;

        $contact->save();
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function status(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        $contact->status = ($contact->status==1)?2:1;
        $contact->updated_at= date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id()??1;
        $contact->save();

        return redirect()->route('admin.contact.index');
    }
    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        $contact->status = 0;
        $contact->updated_at= date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id()??1;
        $contact->save();

        return redirect()->route('admin.contact.index');
    }
    public function trash()
    {
        $list = Contact::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","phone","email","title","status")
        ->get();
        return view("backend.contact.trash",compact("list"));
    }
    public function restore(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');        
        }
        $contact->status = 2;
        $contact->updated_at= date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id()??1;
        $contact->save();

        return redirect()->route('admin.contact.trash');
    }
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null){
            return redirect()->route('admin.contact.index');
        }
        $contact->delete();

        return redirect()->route('admin.contact.trash');
    }
}
