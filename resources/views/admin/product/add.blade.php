@extends('admin.admin-master')
@section('products') active show-sub @endsection
@section('add-products') active  @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>      
      <span class="breadcrumb-item active">Add Products</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New Products</h6> 

          <form action="{{ route('store-products') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ (old('product_name')) }}" placeholder="Product Product Name">
                  @error('product_name')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
             
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">product_code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ (old('product_code')) }}" placeholder="Product Product Code">
                  @error('product_code')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{ (old('price')) }}" placeholder="Product Price">
                  @error('price')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{ (old('product_quantity')) }}" placeholder="Product Quantity">
                  @error('product_quantity')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose Category">                   
                    <option label="Choose Category"></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach                 
                  </select>
                  @error('category_id')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="brand_id" data-placeholder="Choose Brand">
                   
                    <option label="Choose Brand"></option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach                 
                  </select>
                  @error('brand_id')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote" cols="30" rows="10"></textarea> 
                  @error('short_description')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror                 
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2" cols="30" rows="10"></textarea>
                  @error('long_description')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror  
                                   
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one" >
                  @error('image_one')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror 
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two" >
                  @error('image_two')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror 
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three" >
                  @error('image_three')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror 
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Add Products</button>
               </div><!-- form-layout-footer -->
              </form>
          </div><!-- form-layout -->
        </div><!-- card -->

         
    </div>
</div>
@endsection
