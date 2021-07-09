<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    
    public function HomeSlider()
    {
        $slidres = Slider::latest()->get();
        return view('admin.slider.index', compact('slidres'));
    }

    
    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    
    public function StoreSlider(Request $request, $id)
    {
        
        $validated = $request->validate([
            'title' => 'required|unique:sliders|min:4',
            'description' => '',
            'image' => 'required|mimes:jpg,jpeg,png,JPG',
            
        ],
        [
            'title.required' => 'Please Imput Brand name',
            'title.unique' => 'This Name is Already Entry',
            'title.min' => 'Brand name minimum four charecters',
            'image.required' => 'Please Select a  Image jpg / jpeg / png',
        ]);
         /*
            Image Intervation Packeges use below
        */
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $path = public_path("images/slider/".$id."/".$name_gen);
        Image::make($image->getRealPath())->resize(1920,1088)->save('images/slider/'.$name_gen);
        $last_img = 'images/slider/'.$name_gen;
       
  
     

        Slider::insert([
                'title' => $request->title,
                'image' => $last_img,
                'description' => $request->description,
                'created_at' => Carbon::now(), 

        ]);

        return redirect()->route('home.slider')->with('success','Slider  Inserted Successfully');
    }

  
    public function show($id)
    {
        //
    }

    
    public function Edit($id)
    {

       
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
        ],
        [
            'title.required' => 'Please Imput Brand name',            
            'title.min' => 'Brand name minimum four charecters',
            
        ]);

        $old_image = $request->old_image;


        $image = $request->file('image');

        if($image){

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1088)->save('images/slider/'.$name_gen);
            $last_img = 'images/slider/'.$name_gen;
    
           
            
                unlink($old_image);
               
    
                Slider::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $last_img,
                    'created_at' => Carbon::now(), 
    
            ]);
    
            return redirect()->back()->with('success','Slider Updated Successfully');

        }else{

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(), 

        ]);

        return redirect()->back()->with('success','Slider Updated Successfully');

        }

       
    } 
      
    public function Delete($id)
    {
        $images = Slider::find($id);
        $old_image = $images->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return redirect()->back()->with('success','Slider Data Deleted Successfully');
    }


   
}
