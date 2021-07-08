<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat(){
        // echo"Hello This is by Mahbub";
        $categorys = Category::latest()->paginate(5);
        // Model::latest('id')->get();
        return view('admin.category.index',compact('categorys'));
    }
      

      public function AddCar(Request $request){
       $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        
    ],
    [
        'category_name.required'=>'Please Input Category Name',
        'category_name.max'=>'Please Input less than 255 Charehter',
        'category_name.unique'=>'Category Must be Unique',

    ]);

       Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
       ]);
            return Redirect()->back()->with('success','New Category Inserted Successfull');

        

    }


}
