@extends('sales_admin.layout.index')
@section('content')

<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12 pb-3 pt-3">
                    <h4 class="theheader">Create Product
                        <a href="/sales-admin/available-product" class="btn btn-info" style="float: inline-end; "> Available Products</a>
                        <a href="/sales-admin/add-product" class="btn btn-info mr-1" style="float: inline-end;"> Add Products</a>
                    </h4>
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
                                        <label for="warehouse name">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" class="form-control" placeholder="Enter Model Number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="part_code">Part Code</label>
                                        <input type="text" name="part_code" class="form-control" placeholder="Enter Part code" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="limit">Restock Limit</label>
                                        <input type="text" name="limit" class="form-control" placeholder="Enter Limit" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="unit_price">Unit Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter Unit Price" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Product Image</label>
                                        <input type="file" name="product_image" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                                    </div>

                                </div>
                                <button class="btn btn-info" style="float: inline-end; margin-top:20px">Create</button>
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