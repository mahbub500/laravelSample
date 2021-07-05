<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat(){
        // echo"Hello This is by Mahbub";
        return view('admin.category.index');
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
        

    }


}
