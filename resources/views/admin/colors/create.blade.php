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
                    <h3>Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Color Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Color Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" style="height: 30px; width:30px;"> Checked="Hidden",UnChecked="Visible"
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</div>



@endsection
