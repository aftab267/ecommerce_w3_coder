@extends('admin.admin-master')
@section('orders') active @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>      
      <span class="breadcrumb-item active">View orders</span>
    </nav>

    <div class="sl-pagebody">
       <div class="row row-sm">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Shipping Address</h6>
          
  
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="firstname" value="{{ $shipping->shipping_first_name }}" readonly placeholder="Enter Firstname" >
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" value="{{ $shipping->shipping_last_name }}" readonly placeholder="Enter lastname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_email }}" readonly  placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_phone }}" readonly  placeholder="Enter Phone">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Shipping Address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->address }}" readonly  placeholder="Enter  address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->state }}" readonly  placeholder="Enter  state">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PostCode: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->post_code }}" readonly  placeholder="Enter postcode">
                  </div>
                </div><!-- col-4 -->
             
               
              </div><!-- row -->
  
          
            </div><!-- form-layout -->
          
            </div>
        </div>
       
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order</h6>
          
  
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="firstname" value="{{ $order->invoice_no }}" readonly  >
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" value="{{ $order->payment_type }}" readonly >
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $order->total }}" readonly  >
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $order->subtotal }}" readonly >
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>
                    @if($order->coupon_discount==null)
                    <span class="badge badge-pill badge-danger">NO</span>
                    @else
                    <span class="badge badge-pill badge-success">{{ $order->coupon_discount }}%</span>                  
                    
                    @endif
                    
                  </div>
                </div><!-- col-4 -->
                
             
               
              </div><!-- row -->
  
          
            </div><!-- form-layout -->
          
            </div>
        </div>
        
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order Items</h6>
          
  
            <div class="form-layout">
              
                <div class="table-wrapper">
                    <table id="" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderitems as $row)
                            <tr>                               
                                <td>
                                    <img src="{{ asset($row->product->image_one) }}" height="50px" width="50px" alt="img">
                                </td> 
                                <td>{{ $row->product->product_name }}</td>                               
                                <td>{{ $row->product_qty }}</td>                               
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
  
          
            </div><!-- form-layout -->
          
           
        </div>

          
    </div>

      


</div>
@endsection
