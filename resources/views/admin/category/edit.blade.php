<x-app-layout>
   
    <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                <div class="row">
                 
                <div class="col-md-4 pt-2">
                    <div class="card">
                        <div class="card-header">Update Category </div>
                        <div class="card-body">
                             <form action="{{url('category/update/'.$categorys->id)}} " method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Update Category Name</label>
                                <input type="text " value="{{$categorys->category_name}}" name="category_name" class="form-control" placeholder="Update Category Name ">
                                @error('category_name')
                                    <span class="text-danger"> {{$message}} </span>
                                @enderror

                              </div>
                              <button type="submit" class="btn btn-primary">Update Category </button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
