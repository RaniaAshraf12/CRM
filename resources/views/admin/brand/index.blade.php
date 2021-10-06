<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Brand<b> </b>
            
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
                                    All Brand
                                  </div>
                                
                             
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created_At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @php ( $i=1 ) --}}
                                @foreach ($brands as $brand)
                                    
                                
                              <tr>
                                <th scope="row">{{$brands->firstitem()+$loop->index}}</th>
                                <td>{{$brand->brand_name}}</td>
                                <td><img src="{{asset($brand->braand_image)}}" style="height:90px ; width:70px; ">{{$brand->brand_image}}</td>
                                <td>
                                    @if($brand->created_at == null)
                                    <span class="text-danger"> No Date Set </span>
                                    @else
                                    {{carbon\carbon::parse($brand->created_at)->DiffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href ="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                    <a href ="{{url('brand/delete/'.$brand->id)}}" onclick=" return confirm ('Are You Sure to delete');" class="btn btn-danger">Delete</a>
                                </td>
                              </tr>
                              @endforeach
                            
                           
                            </tbody>
                          </table>
                        </div>
                        <div>
                            {{$brands->links()}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" >
                            <div class="card-header">
                                Add Brands
                              </div>
                            <div class="card-body">
                                <form action="{{ route ('store.brand')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <div class="row mb-4">
                                      <label for="inputEmail3" class="col-sm-4 col-form-label">Brand Name</label>
                                      <div class="col-sm-8">
                                        <input type="text" name="brand_name" class="form-control" id="inputEmail3">
                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Brand Image</label>
                                        <div class="col-sm-8">
                                          <input type="file" name="brand_image" class="form-control" id="inputEmail3">
                                          @error('brand_image')
                                          <span class="text-danger">{{$message}}</span>
                                              
                                          @enderror
                                        </div>
                                      </div>
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                
            </div>

    </div>
</x-app-layout>
