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
       
 <div class="col-md-8">
    <div class="card">
               
                    <div class="card-header">  Edit Home About  </div>
    <div class="card-body">
        <form action="{{ url('/homeabout/update/'.$homeabouts->id )}}" method="POST">
             @csrf
            <div class="form-group">
            <label for="exampleFormControlInput1">Home About Title</label>
            <input type="text" name ="title" class="form-control" id="exampleFormControlInput1" value="{{ $homeabouts->title }}">
            
             </div>
        
        
        
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Home About Short Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="short_dis">{{ $homeabouts->short_dis }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Home About Long Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="long_dis">{{ $homeabouts->long_dis }}</textarea>
            </div>
        
        
            <div class="form-footer pt-4 pt-5 mt-3 border-top">
                <button type="submit" class="btn btn-primary btn-default">Update</button>
                
            </div>
        </form>
     </div>
    </div>
    
    
</div>
</div>
</div>    
    
</div>
    
    
    
    
    
@endsection