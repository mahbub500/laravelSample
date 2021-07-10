<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function AllCat(){
        // $categorys = DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);

        // echo"Hello This is by Mahbub";
        $categorys = Category::latest()->paginate(5);
        // dd($categorys);
        $trashed= Category::onlyTrashed()->latest()->paginate(3);
        // $trashed= Category::onlyTrashed()->get()->latest();
        // $trashed= Category::onlyTrashed()->latest()->limit(5)->get();
          // dd($trashed);
        // Model::latest('id')->get();
        return view('admin.category.index',compact('categorys','trashed'));
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

    public function edit($id){
        $categorys= Category::findOrFail($id);
        return view('admin.category.edit',compact('categorys'));
    }
    public function update(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id'=>Auth::user()->id

        ]);
        return Redirect()->route('all.category')->with('success',' Category Updated Successfull');
    }
    public function SoftDelete( $id){
        $delte = Category::findOrFail($id)->delete();

    return Redirect()->back()->with('success',' Category Trashed Successfull');
    }

    public function restore($id){
        $delete = Category::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success',' Category Restore Successfull');
        
    }
    public function permanentDelete($id){
        $permanet = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success',' Category Deleted Successfull');
    }


}
