<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        @if(Auth::user())
        <!-- <h1> Hello </h1> -->

         Hi <b> {{Auth::user()->name}} </b> Welcome To Laravel

        @else
        Welcome To Laravel.

        @endif


         <b style="float:right;"> 
        <button type="button" class="btn btn-primary ">
        Total Category <span class="badge badge-light">{{count($categorys)}}</span>
            </button>
          </b>
        </h2>
         
    </x-slot>
    <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                <div class="row">
                    <div class="col-md-8 pt-2">
                         <!-- alert -->
                         @if(session('success'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                    <div class="card">
                        <div class="card-header">
                            All Category 
                        </div>
                    </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Name</th>
                        <th scope="col">User Name </th>
                        <th scope="col">When Sign Up</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <!-- @php($i=1) -->
                        <!-- vardamp('categorys'); -->
                       @foreach($categorys as $category)
                        <tr>
                        <th scope="row">{{$categorys->firstItem()+$loop->index}} </th>
                        <td>{{$category->category_name}}</td>
                        <td class="pl-5">{{$category->user_id}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach


                    
                    </tbody>
                    </table>
                    <div class="card mb-3">
                        
                        {{$categorys->links()}}
                    </div>
                </div>
                <div class="col-md-4 pt-2">
                    <div class="card">
                        <div class="card-header"> Add Category </div>
                        <div class="card-body">
                             <form action="{{route('store.category')}} " method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Enter New Category Name ">
                                @error('category_name')
                                    <span class="text-danger"> {{$message}} </span>
                                @enderror

                              </div>
                              <button type="submit" class="btn btn-primary">Add Category </button>
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
