
@extends('admin.admin_master')
             
 @section('admin')


 <div class="col-lg-12">
<div class="card card-default">
                
    <div class="card-header card-header-border-bottom">
        <h2>Create Service </h2>
    </div>
    <div class="card-body">
    <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Service Title</label>
                <input type="text" name ="s_title" class="form-control @error('s_title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Service Title">
                @error('s_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
         
           
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Service Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="s_description"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Service Image</label>
                <input type="file" name="s_image" class="form-control-file @error('s_image') is-invalid @enderror" id="exampleFormControlFile1">
                @error('s_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 
            <div class="form-footer pt-4 pt-5 mt-3 border-top">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
               
            </div>
        </form>
    </div>
</div>




</div>





 @endsection