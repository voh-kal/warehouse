@extends('sales_admin.layout.index')
@section('content')

<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12 pb-3 pt-3">
                    <h4 class="theheader">Add Product <a href="/sales-admin/available-product" class="btn btn-info" style="float: inline-end;"> Available Products</a></h4>
                </div>
                <div class="col-12">
                    @include('flash')
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-size: medium; font-weight: 600;">Complete Field</div>
                        <div class="card-body">
                            <form action="" method="post" enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" warehouse name">Warehouse Name</label>
                                        <select name="warehouse_id" id="" class="form-control" required>
                                            @if(count($all_warehouse) > 0)
                                            <option value="">Select warehouse</option>
                                            @foreach($all_warehouse as $warehouse)
                                            <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                                            @endforeach
                                            @else
                                            <option value="">No warehouse</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="floor_number">Floor
                                            Number </label>
                                        <input type="text" name="floor_number" class="form-control" placeholder="Enter floor Number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" product name">Product Name</label>
                                        <select name="product_id" id="" class="form-control" required>
                                            @if(count($products) > 0)
                                            <option value="">Select warehouse</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                            @else
                                            <option value="">No products</option>
                                            @endif
                                        </select>
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                        <label for="item">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                                    </div>                                  

                                </div>
                                <button class="btn btn-info" style="float: inline-end; margin-top:20px">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    @include('sales_admin.layout.footer')

</div>



@endsection