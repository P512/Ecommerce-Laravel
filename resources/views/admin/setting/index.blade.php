@extends('layouts.admin')
@section('title','Admin Setting')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Page Title</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keyword" rows="3" class="form-control">{{ $setting->meta_keyword ?? '' }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control">{{ $setting->meta_description ?? '' }}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3 class="text-white mb-0">Website - Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" rows="3" class="form-control">{{ $setting->address ?? '' }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone 1 *</label>
                            <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone No. 2</label>
                            <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email Id 1 *</label>
                            <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email Id 2</label>
                            <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3><div class="text-white mb-0">Website - Social Media</div></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook (Optional)</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Twitter (Optional)</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Instagram (Optional)</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>YouTube (Optional)</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3 class="text-white mb-0">Website - Color Changer</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Please Select Color: </label>
                            <input type="color" name="color_code" value="{{ $setting->color_code }}"><br><br>
                            <input type="text" name="color-code" value="{{ $setting->color_code }}" class="form-control"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3 class="text-white mb-0">Website - Logo Changer</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Please Select Your Logo.</label>
                            <input type="file" name="logo" multiple class="form-control"/>
                            @if($setting->logo)
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ asset('uploads/logo/'.$setting->logo) ?? 'logo' }}" style="width: 80px; height:80px;">
                                    </div>
                                </div>
                            @else
                                <h5>No Logo</h5>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color_code }}">
                    <h3 class="text-white mb-0">Website - MAP</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Enter Map URL</label>
                            <input type="text" name="map" value="{{ $setting->map ?? '' }}" class="form-control"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save Settings</button>
            </div>

        </form>
    </div>
</div>

@endsection
