<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        $categories = Category::where('content', '!=', 'ダミーデータ')->where('content', '!=', 'dummy data')->get();
        return view('index',compact('contacts','categories'));
    }//

    public function confirm(ContactRequest $request){
        $contact=$request->only(['category_id','first_name','last_name','gender','email','tel','address','building','detail']);
        session()->put('contact_data', $contact);
        $category = Category::find($contact['category_id']);
        return view('confirm',compact('contact','category'));
    }

    public function store(ContactRequest $request){
        $contact=$request->only(['first_name','last_name','gender','email','tel','address','building','detail','category_id']);
        Contact::create($contact);
        return view('thanks');
    }
}  

