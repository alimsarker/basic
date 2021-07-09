
@extends('admin.admin_master')
             
             @section('admin')
            
            
<div class="col-lg-12">
    <div class="card card-default">
                    
        <div class="card-header card-header-border-bottom">
            <h2>Create Home About </h2>
            </div>
        <div class="card-body">
            <form action="{{ route('store.home_about') }}" method="POST">
                        @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Home About Title</label>
                    <input type="text" name ="title" class="form-control" id="exampleFormControlInput1" placeholder="Home About Title">
                    
                </div>
                
                
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Home About Short Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="short_dis"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Home About Long Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="long_dis"></textarea>
                </div>
                
                
                <div class="form-footer pt-4 pt-5 mt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
    
    
    
    
</div>
    
    
    
    
    
@endsection