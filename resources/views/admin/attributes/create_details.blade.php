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
                    <h3>Add Details
                        <a href="{{ url('admin/attributes/details') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/attributes/create_details') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label>Select Attribute</label>
                                    <select name="attribute_id" class="form-control">
                                        @foreach ($attribute as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label>Data</label>
                                <input type="text" name="data" placeholder="Please Enter Data" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="data_slug" placeholder="Please Enter DataSlug" class="form-control">
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
