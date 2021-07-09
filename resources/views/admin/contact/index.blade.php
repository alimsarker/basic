
@extends('admin.admin_master')
             
             @section('admin')
            
            <div class="py-12">
               
               <div class="container">
               <div class="row">
                  
               <h4 class="mb-2">Contact Page</h4>
               
               
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
                        <div class="card-header">    All Contact Data   <a href="{{ route('add.contact') }}"><button class="btn btn-info ml-2"  style="float: right;">Add Contact</button></a> </div>
                    
                   
               <table class="table table-hover">
          <thead>
        
            <tr>
              <th scope="col">SL No </th>  
              <th scope="col">E-Mail</th> 
              <th scope="col">Phone</th>           
              <th scope="col">Address</th>           
              
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
           
          </thead>
          <tbody>
          @php($i=1)
          @foreach($contacts as $contact)
            <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{$contact->email}} </td>
              <td>{{$contact->phone }} </td>
        
              <td>{{$contact->address}}</td>
             
              <td>
              @if($contact->created_at == NULL)
              <span class="text-danger">No Date Set</span>
              @else
              {{Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}
              @endif
              </td>
        
              <td>
              <a href="{{ url('/contact/edit/'.$contact->id )}}" class="btn btn-info">Edit</a>
          <a href="{{ url('/contact/delete/'.$contact->id )}}" onclick="return confirm('Are You sure You ? want to delete this record')" class="btn btn-danger">Delete</a>
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