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
               
                    <div class="card-header">  Edit Contact  </div>
    <div class="card-body">
        <form action="{{ url('/contact/update/'.$contacts->id )}}" method="POST">
             @csrf
             <div class="form-group">
                    <label for="exampleFormControlInput1">E-Mail</label>
                    <input type="email" name="email" class="form-control input-lg @error('email') is-invalid @enderror" aria-describedby="emailHelp" value="{{($contacts->email)}}">
                    @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                
                
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone Number</label>
                    <input type="text" name="phone" class="form-control input-lg @error('phone') is-invalid @enderror" aria-describedby="emailHelp" value="{{($contacts->phone)}}">
                    @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                  </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" name="address">{{($contacts->address)}}</textarea>
                    @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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