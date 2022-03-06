<?php

namespace App\Http\Controllers\Admin;


use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(10);
        return view('admin.contact.list',compact('contacts'));
    }
    public function create(){
        return view('admin.contact.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'content'=>'required',
        ]);
        Contact::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'content'=>$request->content,
        ]);
        return redirect()->route('admin.contact.index')->with('success','create successfully');
    }
    public function edit($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }
    public function delete($id){
        Contact::where('id',$id)->delete();
        return redirect()->route('admin.contact.index')->with('delete','create successfully');
    }

    public function comment_index(){
        $comments = Comment::paginate(10);
        
        return view('admin.comment.list',compact('comments'));
    }
    public function comment_delete($id){
        Comment::where('id',$id)->delete();
        return redirect()->route('admin.comment.index')->with('delete','create successfully');
    }
}
