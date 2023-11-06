@extends('sales_admin.layout.index')
@section('content')
@php
use App\Models\DistributeProduct;
use App\Models\Product;
use App\Models\Warehouse;
@endphp
<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12">
                    <h4 class="theheader">Available Items</h4>
                </div>
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ITEM CODE</th>
                                            <th>PRODUCT NAME</th>
                                            <th>WAREHOUSE</th>
                                            <th>FLOOR NUMBER</th>
                                            <th>PART CODE</th>
                                            <th>MODEL</th>
                                            <th>DESCRIPTION</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($available_items as $item)
                                        @php
                                        $product = Product::where(['id' => $item->product_id])->first();
                                        $warehouse = Warehouse::where(['id' => $item->warehouse_id])->first();
                                        $dis_id = DistributeProduct::where(['id' => $item->dis_product_id])->first();
                                        @endphp
                                        <tr>
                                            <td>{{$item->item_code}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$warehouse->warehouse_name}}</td>
                                            <td>{{$dis_id->floor_number}}</td>
                                            <td>{{$product->part_code}}</td>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->description}}</td>

                                            <td>{{$item->status}}</td>
                                            <td><a href="/sales-admin/cart/add" style="font-size: 12px;">Add To Cart</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- <div class="page-inner">
            <div class="row">
                <div class="col-12">
                    <h4 class="theheader">Sold Items</h4>
                </div>
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ITEM CODE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($available_items as $item)
                                        <tr>
                                            <td>{{$item->item_code}}</td>
                                            <td>{{$item->status}}</td>
                                            <td><a href="/sales-admin/products/{{$item->item_code}}/items" style="font-size: 12px;">Add To Cart</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> -->

    </div>

    @include('sales_admin.layout.footer')

</div>



@endsection