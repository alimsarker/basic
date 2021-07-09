@extends('admin.admin_master')
             
             @section('admin')
             <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>User Profile Update</h2>
                </div>
                
                @if(session('success'))
        
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('update.user.profile') }}">
                    @csrf
                    <div class="form-group">
                            <label for="exampleFormControlPassword3">User Name </label>
                            <input  name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name}}">
                            
                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlPassword3">User E-Mail </label>
                            <input  name="email" type="email" class="form-control @error('oldpasemailsword') is-invalid @enderror" value="{{ $user->email}}">
                           
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       

                        
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </form>
                </div>
            </div>

            @endsection