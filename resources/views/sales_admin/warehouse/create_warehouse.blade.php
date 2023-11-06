@extends('sales_admin.layout.index')
@section('content')

<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12 pb-3 pt-3">
                    <h4 class="theheader">Create Warehouses <a href="/sales-admin/all-warehouse" class="btn btn-info" style="float: inline-end;"> View Warehouse</a></h4>
                </div>
                <div class="col-12">
                   @include('flash')
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-size: medium; font-weight: 600;">Complete Field</div>
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="warehouse name">Name Of Warehouse</label>
                                        <input type="text" name="warehouse_name" class="form-control" placeholder="Enter Warehouse Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Floor Number">Warehouse Floor Number</label>
                                        <input type="number" name="floor_number"  class="form-control" placeholder="Enter Floor Number" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="Address">Warehouse Address</label>
                                        <input type="text" name="address"  class="form-control" placeholder="Address" required>
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