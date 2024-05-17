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
                        <div class="row">
                            <div class="mb-3">
                                <label>Select Product</label>
                                    <select name="product_id" class="form-control">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label>Ram</label>
                                <input type="text" name="ram" placeholder="Please Enter Ram" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Storage</label>
                                <input type="text" name="storage" placeholder="Please Enter Storage" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label>Original Price</label>
                                <input type="number" name="original_price" placeholder="Please Enter Original Price" class="form-control" />
                            </div>


                            <div class="mb-3">
                                <label>Selling Price</label>
                                <input type="number" name="selling_price" placeholder="Please Enter Selling Price" class="form-control" />
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
