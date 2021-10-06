<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class CategoryController extends Controller
{

    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        $trashcat = category::onlyTrashed()->paginate(3);
        // $categories = DB::table('categories')->latest()->paginate(5);
        // $categories = DB::table(`categories`)
        // ->join(`users`, `categories.user_id` , `users.id`)
        // ->select(`categories . *` ,` users.name`)
        // ->latest()->paginate(5);

        return view ('admin.category.index',compact('categories','trashcat'));
    }

    public function AddCat(Request $request){
        //validation
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],
        [
        
            'category_name.required' => 'please input category name',
            'category_name.max' => 'category less than 255chars',
            
        ]);
                      //insert the data
        //    Category::insert([
        //        'category_name' => $request->category_name,
        //        'user_id' => Auth::user()->id,
        //        'created_at' => Carbon::now(),


        //    ]);  
                //2 insert data   
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id; 
        // $category->save();
         

        //  query builder to insert data 
        $data= array();
        $data ['category_name'] =$request->category_name;
        $data['user_id'] = Auth::user()->id ;
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);

           return redirect()->back()->with('success', 'category Inserted Successfully');

       
    }
    public function edit($id){
        // $categories =Category::find($id);
        $categories =DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }

    public function update(Request $request ,$id){
        // $update =Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
        $data = array();
        $data ['category_name'] = $request->category_name;
        $data['user_id'] =Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('all.category')->with('success', 'category Updated Successfully');
    }
    public function softDelete( $id)
    {
        $softDelete= Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category SoftDelete is successfully');
    }
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->Restore();
        return redirect()->back()->with('success', 'Category Resored successfully');

    }
    public function pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('success', 'Category permanently delete successfully');

    }
}