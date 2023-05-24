@extends('admin.admin-master')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">      
      <a class="breadcrumb-item" href="index.html">Coupon</a>
      <span class="breadcrumb-item active">Update</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">    
         

            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Update Coupon
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

                        <form action="{{ route('update.coupon',$coupon->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $coupon->id }}" name="id">
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">Update Coupon</label>
                            <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->coupon_name }}">

                            @error('coupon_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Update Discount</label>
                            <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->discount }}">

                            @error('discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Update Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
    </div> 


</div>
@endsection
