<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(){
      $contacts = Contact::where('id', 0)->paginate(7);
      $categories = Category::all();
      return view('admin', compact('contacts','categories'));
    }

    //
    public function search(Request $request)
    {        $contacts=Contact::with('category')  
             ->ContactSearch(
             $request->first_name,
             $request->last_name,
             $request->email,
             $request->gender,
             $request->category_id,
             $request->created_at
        )
        ->KeywordSearch($request->keyword)
        ->paginate(7);

        $categories=Category::all();
        return view('admin',compact('contacts','categories'));
    }

   public function destroy(Contact $contact)
   {
    $contact->delete();
    return redirect()->route('admin');
   }
 
}


