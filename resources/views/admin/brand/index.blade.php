@extends('admin.admin-master')
@section('brand') active @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>      
      <span class="breadcrumb-item active">Brand</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">
            <div class="col-md-8">          
          
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Brand List</h6>
                    @if(session('catUpdated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('catUpdated')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                      @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('delete')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                      @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                   
          
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Sl</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-20p">Status</th>                            
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $key=>$row)

                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->brand_name }}</td>
                            <td>
                                @if($row->status==1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>                            
                            <td>
                                <a href="{{ url('admin/brand/edit/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> </a>
                                <a href="{{ url('admin/brand/delete/'.$row->id) }}" onclick="return confirm('Are You want ro delete? ')"
                                 class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                 @if($row->status==1)
                                <a href="{{ url('admin/brand/inactive/'.$row->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{ url('admin/brand/active/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></a>
                                @endif
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
                    <div class="card-header">Add Brand
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
                          
                        <form action="{{ route('store.brand') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Add brand</label>
                            <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>




                    </div>
                </div>
            </div>
    </div>

      


</div>
@endsection
