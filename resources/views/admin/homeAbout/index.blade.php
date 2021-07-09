
@extends('admin.admin_master')
             
             @section('admin')
            
            <div class="py-12">
               
               <div class="container">
               <div class="row">
                  
               <h4 class="mb-2">Home About</h4>
               
               
                    <div class="col-md-12">
                  
                    <div class="card">
        
                            @if(session('success'))
        
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
        
                            @endif
                        <div class="card-header">    All About Data   <a href="{{ route('add.home_about') }}"><button class="btn btn-info ml-2"  style="float: right;">Add About</button></a> </div>
                    
                   
               <table class="table table-hover">
          <thead>
        
            <tr>
              <th scope="col" width=10%>SL No </th>
              
              <th scope="col" width=15%>title</th>
              <th scope="col" width=15%>Short Description</th>
              <th scope="col" width=30%>Long Description</th>
              <th scope="col" width=15%>Created At</th>
              <th scope="col" width=15%>Action</th>
            </tr>
           
          </thead>
          <tbody>
          @php($i=1)
          @foreach($homeabouts as $homeabout)
            <tr>
            <th scope="row">{{ $i++ }}</th>
           
        
              <td>{{$homeabout->title}}</td>
              <td style="text-align: justify;">{{$homeabout->short_dis}} </td>
              <td style="text-align: justify;">{{$homeabout->long_dis}} </td>
              <td>
              @if($homeabout->created_at == NULL)
              <span class="text-danger">No Date Set</span>
              @else
              {{Carbon\Carbon::parse($homeabout->created_at)->diffForHumans()}}
              @endif
              </td>
        
              <td>
              <a href="{{ url('/homeabout/edit/'.$homeabout->id )}}" class="btn btn-info">Edit</a>
          <a href="{{ url('/homeabout/delete/'.$homeabout->id )}}" onclick="return confirm('Are You sure You ? want to delete this record')" class="btn btn-danger">Delete</a>
       </td>
        
            </tr>
            @endforeach
          </tbody>
        </table>
      
        </div>
         </div> 
                   
               
               </div>       
               </div>
        
           
        
            </div>
        
        @endsection