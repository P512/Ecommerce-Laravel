@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Attributes List
                        <a href="{{ url('admin/attributes/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Attributes</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Ram</td>
                                <td>Storage</td>
                                <td>Original_Price</td>
                                <td>Selling_Price</td>
                                <td>Quantity</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($attributes as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->product)
                                        {{ $item->product->name }}
                                    @else
                                        No Product
                                    @endif
                                </td>
                                <td>{{ $item->ram }}</td>
                                <td>{{ $item->storage }}</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                    @if($item->product)
                                        {{ $item->product->quantity }}
                                    @else
                                        No Product
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/attributes/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/attributes/'.$item->id.'/delete') }}" onclick="return confirm('Are You Sure Want To Delete This Data ?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>



@endsection
