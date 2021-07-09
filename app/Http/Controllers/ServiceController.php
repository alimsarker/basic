<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
   
    public function HomeService()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    
    public function AddService()
    {
        return view('admin.service.create');
    }

   
    public function StoreService(Request $request)
    {
        $validated = $request->validate([
            's_title' => 'required|unique:services|min:4',
            's_description' => '',
            's_image' => 'required|mimes:jpg,jpeg,png,JPG',
            
        ],
        [
            's_title.required' => 'Please Imput Brand name',
            's_title.unique' => 'This Name is Already Entry',
            's_title.min' => 'Brand name minimum four charecters',
            's_image.required' => 'Please Select an  Image',
            's_image.mimes' => 'Please Select an  Image jpg / jpeg / png/',
        ]);
         /*
            Image Intervation Packeges use below
        */
        $image = $request->file('s_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,1088)->save('images/service/'.$name_gen);
        $last_img = 'images/service/'.$name_gen;
       

        Service::insert([
                's_title' => $request->s_title,
                's_image' => $last_img,
                's_description' => $request->s_description,
                'created_at' => Carbon::now(), 

        ]);

        return redirect()->route('home.service')->with('success','Slider  Inserted Successfully');
    }

   
    public function Edit($id)
    {
        $services = Service::find($id);
        return view('admin.service.edit',compact('services'));
    }

    
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
            's_title' => 'required|min:4',
        ],
        [
            's_title.required' => 'Please Imput Brand name',            
            's_title.min' => 'Brand name minimum four charecters',
            
        ]);

        $old_image = $request->old_image;


        $image = $request->file('image');

        if($image){

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1088)->save('images/service/'.$name_gen);
            $last_img = 'images/service/'.$name_gen;
    
           
            
                unlink($old_image);
               
    
                Service::find($id)->update([
                    's_title' => $request->s_title,
                    's_description' => $request->s_description,
                    's_image' => $last_img,
                    'created_at' => Carbon::now(), 
    
            ]);
    
            return redirect()->route('home.service')->with('success','Service Data Updated Successfully');

        }else{

            Service::find($id)->update([
                's_title' => $request->s_title,
                's_description' => $request->s_description,
                'created_at' => Carbon::now(), 

        ]);

        return redirect()->route('home.service')->with('success','Service Data  Updated Successfully');

        }
    }

    
    public function Delete($id)
    {
        $images = Service::find($id);
        $old_image = $images->s_image;
        unlink($old_image);

        Service::find($id)->delete();
        return redirect()->back()->with('success','Slider Data Deleted Successfully');
    }

   
}
