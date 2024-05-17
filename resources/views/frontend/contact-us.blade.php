@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="container-fluid">
    <div class="container mt-4 section-2">
        <div class="row">

            <div class="col-md-6 mt-3" style="padding: 30px">
                <h2 class="text-center">Reach Us</h2>
                <div class="underline w-100"></div>
                <br>
                    <div class="mb-2">
                        <h4>
                            <i class="fa fa-map-marker"></i>
                            {{ $appSetting->address ?? 'address' }}
                        </h4>
                    </div>
                    <br>

                    <div class="mb-2">
                            <h4><i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone1' }}</h4>
                    </div>
                    <br>

                    <div class="mb-2">
                            <a href="https://mail.google.com/mail/u/0/" style="text-decoration: none; color:black"><h4><i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email1' }}</h4></a>
                    </div>
            </div>

            <div class="col-md-6 mt-3" style="padding: 30px">
                <h2 class="text-center">Contact First ☝️</h2>
                <div class="underline w-100"></div>
                <form action="{{ url('about') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Name </label>
                                <input type="text" required="" name="name" placeholder="Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Email </label>
                                <input type="email" required="" name="email" placeholder="Email Address" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" required="" name="subject" placeholder="Subject" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea rows="3" required="" name="message" class="form-control" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <button type="submit" name="send_message" class="btn btn-primary">Submit Now <i class="fa fa-long-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div>
    <iframe src="{{ $appSetting->map }}" width="100%" height="400px"></iframe>
</div>
@endsection
