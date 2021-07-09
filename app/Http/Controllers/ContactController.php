<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    
    public function AddContact()
    {
        return view('admin.contact.create');
    }

    
    public function StoreContact(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts|max:15',
            
        ],
        [
            'address.required' => 'Please Imput address',
            'email.required' => 'Please Imput email',
            'email.unique' => 'This email is Already Entry',
            'phone.max' => 'The Number is Invalid',
            
        ]);

    // Eloquent ORM Insert data formulla-1

    Contact::insert([
            'email' => $request->email,
            'address' =>  $request->address,
            'phone' =>  $request->phone,
            'created_at' => Carbon::now()

        ]);    
     
    
        return redirect()->route('admin.contact')->with('success','Contact Inserted Successfully');
    }

   
    public function Edit($id)
    {       

        $contacts = Contact::find($id);       

        return view('admin.contact.edit',compact('contacts'));
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'address' => 'required',
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts|max:15',
            
        ],
        [
            'address.required' => 'Please Imput address',
            'email.required' => 'Please Imput email',
            'email.unique' => 'This email is Already Entry',
            'phone.max' => 'The Number is Invalid',
            
        ]);

        $contacts =  Contact::find($id)->update([
            'email' => $request->email,
            'address' =>  $request->address,
            'phone' =>  $request->phone,
            'created_at' => Carbon::now()

        ]);    
     
    
        return redirect()->route('admin.contact')->with('success','Contact Updated Successfully');

    }

    
    public function Delete($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with('success','Contact Data Deleted Successfully');
    }


    
  // // Home Contact Controller 

  
    
    public function Contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }

     // // Home Contact Form Controller 


     public function ContactForm(Request $request)
     {
         $contactforms = DB::table('contact_forms')->insert([

            'name' => $request->name,
            'email' =>  $request->email,
            'subject' =>  $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);    
     
    
        return redirect()->route('contact')->with('success','Your Message Send Successfully');

       
     }
    

     public function AdminMessage()
     {
        $contactforms = ContactForm::all();
         return view('admin.contact.contact_form',compact('contactforms'));
     }

     public function MessageDelete($id)
     {
        ContactForm::find($id)->delete();
         return redirect()->route('admin.message')->with('success','Message Deleted Successfully');
     }


     
}
