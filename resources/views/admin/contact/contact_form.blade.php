
@extends('admin.admin_master')
             
             @section('admin')
            
            <div class="py-12">
               
               <div class="container">
               <div class="row">
                  
               <h4 class="mb-2">Message Page</h4>
               
               
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
                        <div class="card-header">    All Messages Data  </div>
                    
                   
               <table class="table table-hover">
          <thead>
        
            <tr>
              <th scope="col">SL No </th> 
              <th scope="col">Name</th>  
              <th scope="col">E-Mail</th> 
              <th scope="col">Subject</th>           
              <th scope="col">Message</th>           
              
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
           
          </thead>
          <tbody>
          @php($i=1)
          @foreach($contactforms as $confo)
            <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{$confo->name}} </td>
              <td>{{$confo->email }} </td>
        
              <td>{{$confo->subject}}</td>
              <td>{{$confo->message}}</td>
              <td>
              @if($confo->created_at == NULL)
              <span class="text-danger">No Date Set</span>
              @else
              {{Carbon\Carbon::parse($confo->created_at)->diffForHumans()}}
              @endif
              </td>
        
              <td>
            
          <a href="{{ url('/message/delete/'.$confo->id )}}" onclick="return confirm('Are You sure You ? want to delete this record')" class="btn btn-danger">Delete</a>
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