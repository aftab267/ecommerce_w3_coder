@extends('admin.admin-master')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Tables</a>
      <span class="breadcrumb-item active">Basic Tables</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Category
                    </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                   

                    {{-- <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Sl NO</th>
                            <th scope="col">Name</th>                            
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)

                        <tr>
                            <th scope="row"></th>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->user->name}}</td>
                        <td>
                            @if($category->created_at == NULL)
                            <span class="text-danger">No Time Set</span>
                            @else
                            {{ $category->created_at->diffForHumans()}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('Category/Edit/'.$category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('softdelte/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{$categories->links()}} --}}

                </div>
            </div>
        </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Category
                    </div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                          
                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Add Category</label>
                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>




                    </div>
                </div>
            </div>
    </div>

      


</div>
@endsection
