@extends('sales_admin.layout.index')
@section('content')

<div class="main-panel">
    <div class="container">


        <div class="page-inner">
            <div class="row">
                <div class="col-12">
                    <h4 class="theheader">All Warehouses</h4>
                </div>
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>ADDRESS</th>
                                            <th>FLOOR NUMBER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($all_warehouse as $warehouse)
                                        <tr>
                                            <td>{{$warehouse->warehouse_name}}</td>
                                            <td>{{$warehouse->address}}</td>
                                            <td>{{$warehouse->floor_number}}</td>
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