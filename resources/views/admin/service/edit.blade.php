@extends('admin.admin_master')
             
     @section('admin')

            @if(session('success'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif
            
<div class="py-12">
       
    <div class="container">
        <div class="row">
       
            <div class="col-md-12">
                <div class="card">
               
                    <div class="card-header">  Edit Service   </div>
                <div class="card-body">
                <form action="{{ url('/service/update/'.$services->id )}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slider Title</label>
                            <input type="text" name ="s_title" class="form-control" id="exampleFormControlInput1" value="{{ $services->s_title }}">
                            
                        </div>
                
                
                    
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Service Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="s_description">{{ $services->s_description }}</textarea>
                        </div>
                    <input type="hidden" name="old_image" value="{{ $services->s_image }}"
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Service Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            <img src="{{ asset($services->s_image) }}" style="height:100px; width:200px; margin-top:5px;">
                        </div>
                            <div class="form-footer pt-4 pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-default mb-5">Update</button>
                            
                            </div>
                        </form>
                    </div>
                </div>       
            </div>
       
        </div>       
    </div>

@endsection
