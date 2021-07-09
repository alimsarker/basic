<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
  
    public function CPassword()
    {
        return view('admin.layouts.chang_pass');
    }

    
   

   
    public function PassUpdate(Request $request)
    {
        $validated = $request->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed',
                       
        ]);

        $hasPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hasPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success','Chenged Password  Successfully');

        }else{
            return redirect()->back()->with('error',' Current Password is Invalid!');

        }
    }

  // Profile Update Control section
    public function PUpdate()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.layouts.update_profile',compact('user'));
            }

        }
    }

   
    public function UserUpdateProfile(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required',
            'email' => 'required',
                       
        ]);
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('success',' User Update Profile Successfully Updated');

        }else{
            return redirect()->back();
        }
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
