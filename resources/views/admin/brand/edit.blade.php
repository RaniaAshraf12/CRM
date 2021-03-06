<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Edit Brand<b> </b>
            
        </h2>
    </x-slot>
                                  @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('success')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
                <div class="container">
                    <div class="row">
                        
                    <div class="col-md-8">
                        <div class="card" >
                            <div class="card-header">
                                Edit Brand
                              </div>
                            <div class="card-body">
                                <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <input type="hidden" name='old_image' value="{{$brands->braand_image}}">
                                    <div class="row mb-4">
                                      <label for="inputEmail3" class="col-sm-4 col-form-label"> Update Brand Name</label>
                                      <div class="col-sm-8">
                                        <input type="text" name="brand_name" class="form-control" id="inputEmail3" value="{{$brands->brand_name}}">
                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                      </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label"> Update Brand Images</label>
                                        <div class="col-sm-8">
                                          <input type="file" name="brand_image" class="form-control" id="inputEmail3" value="{{$brands->braand_image}}">
                                          @error('brand_image')
                                          <span class="text-danger">{{$message}}</span>
                                              
                                          @enderror
                                        </div>
                                      </div>


                                       <div class=' row mb-4'>
                                           <div class="col-sm-8" >
                                            <img src="{{asset($brands->braand_image)}}" style="height: 200px; width:400px">
                                           </div>
                                           
                                       </div>





                                    <button type="submit" class="btn btn-primary">Update Brand</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
