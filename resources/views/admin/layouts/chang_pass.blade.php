@extends('admin.admin_master')
             
             @section('admin')
             <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Change Password</h2>
                </div>
                
               
                @if(session('error'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="form-pill">
                    @csrf
                    <div class="form-group">
                            <label for="exampleFormControlPassword3">Current Password </label>
                            <input id="current_password" name="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror"  placeholder=" Current Password">
                            @error('oldpassword')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword3">New Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="New Password">
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlPassword3">Confirm Password </label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  placeholder=" Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                    </form>
                </div>
            </div>

            @endsection