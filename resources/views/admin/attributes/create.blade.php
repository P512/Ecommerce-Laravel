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
                    <h3>Add Attributes
                        <a href="{{ url('admin/attributes') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/attributes/create') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label>Attribute</label>
                                <input type="text" name="name" placeholder="Please Enter Attribute" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</div>



@endsection
