<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{
    
    public function  HomeAbout()
    {
        $homeabouts = HomeAbout::latest()->get();
        return view('admin.homeAbout.index',compact('homeabouts'));
    }

   
    public function AddHomeAbout()
    {
        return view('admin.homeAbout.create');
    }

    
    public function StoreHomeAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_dis' => '',
            'long_dis' => '',
            
        ],
        [
            'title.required' => 'Please Imput Home About Title',
            
        ]);

        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' =>  $request->short_dis,
            'long_dis' =>  $request->long_dis,
            'created_at' => Carbon::now()

        ]);
        
        return redirect()->route('home.about')->with('success','Home About  Inserted Successfully');
    }

   
    public function show($id)
    {
        //
    }

  
    public function Edit($id)
    {
        $homeabouts = HomeAbout::find($id);
        return view('admin.homeAbout.edit',compact('homeabouts'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_dis' => '',
            'long_dis' => '',
            
        ],
        [
            'title.required' => 'Please Imput Home About Title',
            
        ]);

         $homeabout =  HomeAbout::find($id)->update([

                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis
            ]);
            return redirect()->route('home.about')->with('success','Home About Updated Successfully');
    }

  
    public function Delete($id)
    {
        HomeAbout::find($id)->delete();
        return redirect()->back()->with('success','Brand Data Deleted Successfully');
    }
}
