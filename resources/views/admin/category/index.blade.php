<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories 
        </h2>
    </x-slot>

    <div class="py-12">
       
       <div class="container">
       <div class="row">
            <div class="col-md-8">
            <div class="card">

                    @if(session('success'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                <div class="card-header">    All Categories   </div>
            
           
       <table class="table table-hover">
  <thead>

    <tr>
      <th scope="col">SL No </th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
   
  </thead>
  <tbody>
  <!-- @php($i=1) -->
  @foreach($categories as $category)
    <tr>
    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>

      <td>
      @if($category->created_at == NULL)
      <span class="text-danger">No Date Set</span>
      @else
      {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
      @endif
      </td>

      <td>
          <a href="{{ url('/category/edit/'.$category->id )}}" class="btn btn-info">Edit</a>
          <a href="{{ url('/trachCat/edit/'.$category->id )}}" class="btn btn-danger">Deletet</a>
       </td>

    </tr>
    @endforeach
  </tbody>
</table>
{{ $categories->links() }}
</div>
 </div> 
            <div class="col-md-4">
                <div class="card">

                    <div class="card-header">  Add Categories  </div>
                    <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                    @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name">
                                
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                    </div>
                </div>       
            </div>
       
       </div>       
       </div>

    <!-- ---------------Trash Part -------------------->

       <div class="container">
       <div class="row">
            <div class="col-md-8">
            <div class="card">

                   
                <div class="card-header">    Trash List    </div>
            
           
       <table class="table table-hover">
       <thead>

            <tr>
            <th scope="col">SL No </th>
            <th scope="col">Category Name</th>
            <th scope="col">User</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
            </tr>

        </thead>
         <tbody>
            <!-- @php($i=1) -->
            @foreach($trachCat as $category)
            <tr>
            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
            <td>{{$category->category_name}}</td>
            <td>{{$category->user->name}}</td>

            <td>
            @if($category->created_at == NULL)
            <span class="text-danger">No Date Set</span>
            @else
            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
            @endif
            </td>

            <td>
                <a href="{{ url('/category/restore/'.$category->id )}}" class="btn btn-info">Restore</a>
                <a href="{{ url('/category/pdelete/'.$category->id )}}" class="btn btn-danger">P. Deletet</a>
            </td>

            </tr>
            @endforeach
        </tbody>
</table>
   
  </thead>
  <tbody>
 

  </tbody>
</table>
{{ $trachCat->links() }}
</div>
 </div> 
            <div class="col-md-4">


            </div>
       
       </div>       
       </div>

  <!------------------------ End Trash -------------------->

    </div>
</x-app-layout>