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
                        <a href="{{ url('admin/attributes') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/attributes/'.$attribute->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Select Product</label>
                                <select name="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ $attribute->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="mb-3">
                            <label>Ram</label>
                            <input type="text" name="ram" value="{{ $attribute->ram }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Storage</label>
                            <input type="text" name="storage" value="{{ $attribute->storage }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Original_Price</label>
                            <input type="number" name="original_price" value="{{ $attribute->original_price }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Selling_Price</label>
                            <input type="number" name="selling_price" value="{{ $attribute->selling_price }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{ $attribute->product->quantity }}" class="form-control">
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
