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
                    <h3>Attributes Details
                        <a href="{{ url('admin/attributes/create_details') }}" class="btn btn-primary btn-sm text-white float-end">Add Attributes Details</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Attribute Name</td>
                                <td>Attribute Data</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attribute_details as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->attribute->name }}</td>
                                <td>{{ $item->data }}</td>
                                <td>
                                    <a href="{{ url('admin/attributes/details/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/attributes/details/'.$item->id.'/delete') }}" onclick="return confirm('Are You Sure Want To Delete This Data ?')" class="btn btn-danger btn-sm">Delete</a>
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
