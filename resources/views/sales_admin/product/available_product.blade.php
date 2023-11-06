@extends('sales_admin.layout.index')
@section('content')
@php
use App\Models\Item;
@endphp

<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12">
                    <h4 class="theheader">All Products</h4>
                </div>
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT NAME</th>
                                            <th>MODEL</th>
                                            <th>PART CODE</th>
                                            <th>QUANTITY</th>
                                            <th>PRICE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($available_products as $product)
                                        @php $items_total = Item::where(['product_id' => $product->id, 'status' => 'available'])->count(); @endphp
                                        <tr>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->part_code}}</td>
                                            <td>{{$items_total}}</td>
                                            <td>{{$product->price}}</td>
                                            <td><a href="/sales-admin/products/{{$product->id}}/items" style="font-size: 10px;">See More ></a></td>

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

    </div>

    @include('sales_admin.layout.footer')

</div>



@endsection