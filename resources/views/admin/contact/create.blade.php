
@extends('admin.admin_master')
             
             @section('admin')
            
            
<div class="col-lg-12">
    <div class="card card-default">
                    
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact </h2>
            </div>
        <div class="card-body">
            <form action="{{ route('store.contact') }}" method="POST">
                        @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">E-Mail</label>
                    <input type="email" name="email" class="form-control input-lg @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="E-Mail">
                    @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                
                
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone Number</label>
                    <input type="text" name="phone" class="form-control input-lg @error('phone') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Phone Number">
                    @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                  </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" name="address"></textarea>
                    @error('address')
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