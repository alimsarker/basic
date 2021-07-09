<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   
    public function PortFolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio',compact('images'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
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
