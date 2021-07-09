
@extends('admin.admin_master')
             
             @section('admin')
            
            <div class="py-12">
               
               <div class="container">
               <div class="row">
                  
               <h4 class="mb-2">Home Slider</h4>
               
               
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
                        <div class="card-header">    All Slider   <a href="{{ route('add.slider') }}"><button class="btn btn-info ml-2"  style="float: right;">Add Slider</button></a> </div>
                    
                   
               <table class="table table-hover">
          <thead>
        
            <tr>
              <th scope="col" width=5%>SL No </th>
              <th scope="col" width=15%>Slider Image</th>
              <th scope="col" width=15%>title</th>
              <th scope="col" width=35%>description</th>
             
              <th scope="col" width=15%>Created At</th>
              <th scope="col" width=15%>Action</th>
            </tr>
           
          </thead>
          <tbody>
          @php($i=1)
          @foreach($slidres as $slider)
            <tr>
            <th scope="row">{{ $i++ }}</th>
            <td><img src="{{ asset($slider->image) }}" style="height:100px; width:200px;"></td>
        
              <td>{{$slider->title}}</td>
              <td style="text-align: justify;">{{$slider->description}} </td>
              <td>
              @if($slider->created_at == NULL)
              <span class="text-danger">No Date Set</span>
              @else
              {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}
              @endif
              </td>
        
              <td>
              <a href="{{ url('/slider/edit/'.$slider->id )}}" class="btn btn-info">Edit</a>
          <a href="{{ url('/slider/delete/'.$slider->id )}}" onclick="return confirm('Are You sure You ? want to delete this record')" class="btn btn-danger">Delete</a>
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