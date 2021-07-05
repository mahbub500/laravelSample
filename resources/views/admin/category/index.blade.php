<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Hi <b> Mahbub  </b> Welcome To Laravel.

         <b style="float:right;"> Total Users 
         <span class="badge badge-danger"> 3 </span>
          </b>
        </h2>
    </x-slot>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                <div class="row">
                    <div class="col-md-8 pt-2">
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
                        <th scope="col">Email </th>
                        <th scope="col">When Sign Up</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mahub</td>
                        <td>Mahbubmr500@gmail.com</td>
                        <td>24 Jun 2021</td>

                        </tr>
                    
                    </tbody>
                    </table>
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
