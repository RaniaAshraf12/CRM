<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category<b> </b>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" >
                                                    {{-- alert --}}
                                  @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('success')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                    @endif
                                <div class="card-header">
                                    All Category
                                  </div>
                                
                             
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created_At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @php ( $i=1 ) --}}
                                @foreach ($categories as $category)
                                    
                                
                              <tr>
                                <th scope="row">{{$categories->firstitem()+$loop->index}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    @if($category->created_at == null)
                                    <span class="text-danger"> No Date Set </span>
                                    @else
                                    {{carbon\carbon::parse($category->created_at)->DiffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href ="{{url('category/edit/'.$category->id)}} " class="btn btn-info">Edit</a>
                                    <a href ="{{url('softdelete/category/'.$category->id)}} " class="btn btn-danger">Delete</a>
                                </td>
                              </tr>
                              @endforeach
                            
                           
                            </tbody>
                          </table>
                        </div>
                        <div>
                            {{$categories->links()}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" >
                            <div class="card-header">
                                All Category
                              </div>
                            <div class="card-body">
                                <form action="{{ route ('store.category')}}" method="POST">
                                     @csrf
                                    <div class="row mb-4">
                                      <label for="inputEmail3" class="col-sm-4 col-form-label">Category Name</label>
                                      <div class="col-sm-8">
                                        <input type="text" name="category_name" class="form-control" id="inputEmail3">
                                        @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                
            </div>

            {{-- trashed part --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" >
                               
                                <div class="card-header">
                                   Trash  List
                                  </div>
                                
                             
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created_At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @php ( $i=1 ) --}}
                                @foreach ($trashcat as $category)
                                    
                                
                              <tr>
                                <th scope="row">{{$trashcat->firstitem()+$loop->index}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    @if($category->created_at == null)
                                    <span class="text-danger"> No Date Set </span>
                                    @else
                                    {{carbon\carbon::parse($category->created_at)->DiffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href ="{{url('category/restore/'.$category->id)}} " class="btn btn-info">Resotre</a>
                                    <a href ="{{url('category/pdelete/'.$category->id)}} " class="btn btn-danger">P Delete</a>
                                </td>
                              </tr>
                              @endforeach
                            
                           
                            </tbody>
                          </table>
                        </div>
                        <div>
                            {{$trashcat->links()}}
                        </div>
                    </div>
                    <div class="col-md-4">
                       
                    </div>

                    </div>
                </div>
                
            </div>
            {{-- End Trush --}}
    </div>
</x-app-layout>
