@extends('admin.admin-master')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">      
      <a class="breadcrumb-item" href="index.html">Brand</a>
      <span class="breadcrumb-item active">Edit</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">    
         

            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Edit Brand
                    </div>

                    <div class="card-body">
                     
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif 

                        <form action="{{ route('update.brand') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $brand->id }}" name="id">
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">Add Brand</label>
                            <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}">

                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
    </div> 


</div>
@endsection
