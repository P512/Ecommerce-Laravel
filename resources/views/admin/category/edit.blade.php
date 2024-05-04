@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $category->name }}" name="name"/>
                                @error('name')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control" value="{{ $category->slug }}" name="slug"/>
                                @error('slug')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                @error('description')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                                <img src="{{ asset('uploads/category/'.$category->image) }}" width="60px" height="60px"/>
                                @error('image')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : ''}}/>
                                @error('status')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <h4>
                                    SEO Tags
                                </h4>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title"/>
                                @error('meta_title')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3"> {{ $category->meta_keyword }} </textarea>
                                @error('meta_keyword')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3"> {{ $category->meta_description }}</textarea>
                                @error('meta_description')
                                    <small class="text-denger" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 md-3">
                                <button type="submit" class="btn btn-primary float-end">
                                    Update
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
