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
                    <h3>Edit Attributes
                        <a href="{{ url('admin/attributes/details') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/attributes/details'.$details->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Attribute Data</label>
                            <input type="text" name="data" value="{{ $details->data }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</div>



@endsection
