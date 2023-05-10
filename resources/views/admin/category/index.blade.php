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

                {{-- <div class="sl-page-title">
                    <h5>Data Table</h5>
                    
                  </div><!-- sl-page-title --> --}}
          
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Basic Responsive DataTable</h6>
                   
          
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Sl</th>
                            <th class="wd-15p">Category name</th>
                            <th class="wd-20p">Status</th>                            
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$category)

                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                @if($category->status==1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>                            
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                
                        </tbody>
                      </table>
                     
                   
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
