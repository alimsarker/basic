<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function AllCat()
    {
        // Eloquent ORM System
         $categories = Category::latest()->paginate(5);
          $trachCat = Category::onlyTrashed()->latest()->paginate(3);

        // Eloquent with Query Builders System
        // $categories = DB::table('categories')->latest()->paginate(5);

        // Eloquent with Query Builders Reletionship

        // $categories = DB::table('categories')
        //                 ->join('users','categories.user_id','users.id')
        //                 ->select('categories.*','users.name')
        //                 ->latest()->paginate(5);

         return view('admin.category.index',compact('categories','trachCat'));
    }

   
  

  
    public function AddCat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],
        [
            'category_name.required' => 'Please Imput Category name',
            'category_name.unique' => 'This Name is Already Entry',
            'category_name.max' => 'Category less then 255 charecters',
            
        ]);

    // Eloquent ORM Insert data formulla-1

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' =>  Auth::user()->id,
            'created_at' => Carbon::now()

        ]);

    // Eloquent ORM Insert data formulla-2

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

    // Insert data with Query Builders

        //  $data = array();
        //  $data['category_name'] = $request->category_name;
        //  $data['user_id'] = Auth::user()->id;
        //  $data['created_at'] = Carbon::now(); // এই লাইন লিখলে ইনসার্ট হবে,  না লিখলে নাল থাকবে
        //  DB::table('categories')->insert($data);

     
    
        return redirect()->back()->with('success','Category Inserted Successfully');
    }

  

  
    public function Edit($id)
    {
        // Eloquent ORM Edit data formulla

        $categories = Category::find($id);

        // Edit data with Query Builders

        $categories = DB::table('categories')->where('id', $id)->first();

        return view('admin.category.edit',compact('categories'));
    }

   
    public function Update(Request $request, $id)
    {
         // Eloquent ORM Update data formulla

            // $update =  Category::find($id)->update([

            //     'category_name' => $request->category_name,
            //     'user_id' =>  Auth::user()->id
            // ]);

    // Update data with Query Builders
                $data = array();
                $data['category_name'] = $request->category_name;
                $data['user_id'] = Auth::user()->id;
                DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('all.category')->with('success','Category Updated Successfully');
    }

    
    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();

        return redirect()->back()->with('success','Category SoftDelete Successfully');
    }


    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success','Category Restore Successfully');
    }

    public function PDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success','Category Permanently Deleted');
    }
    
    
}