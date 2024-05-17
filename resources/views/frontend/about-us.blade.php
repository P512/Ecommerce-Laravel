@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <style>
        .section-1 h2 {
            font-size: 42px;
        }

        .section-2 h2 {
            font-size: 38px;
        }

        .section-2 {
            margin-top: 70px;
        }

        .section-2 p {
            font-size: 20px;
            color: rgb(129, 128, 128);
            font-weight: 400;
            line-height: 30px;
            padding: 10px;
        }

        .section-1 img{
            max-height: 400px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 400px;
        }


        /* media query */

        @media only screen and (max-width: 1000px) {

            .section-1 h2,
            .section-2 h2 {
                font-size: 32px;
            }

            .section-2 h3 {
                font-size: 24px;
            }

            .section-2 p {
                font-size: 18px;
            }

        @media only screen and (max-width: 400px) {

            .section-1 h2{
                font-size: 26px;
            }
        }
    }

    @media only screen and (max-width: 376px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }

    @media only screen and (max-width: 416px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }
    @media only screen and (max-width: 432px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }

    @media only screen and (max-width: 770px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }

    @media only screen and (max-width: 821px) {
        .section-1 img{
            max-height: 300px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }

    @media only screen and (max-width: 913px) {
        .section-1 img{
            max-height: 300px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 250px;
        }
    }

    @media only screen and (max-width: 345px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }

    @media only screen and (max-width: 1173px) {
        .section-1 img{
            max-height: 200px;
            margin-left:10%;
            margin-top:8%;
        }

        .section-2 img{
            max-height: 200px;
        }
    }
    </style>


<section class="container-fluid">
    <div class="container mt-4 section-1">
        <div class="row">
            <div class="col-md-6 mt-3" style="padding: 30px">
                <h2 class="text-center">About Us</h2>
                <div class="underline w-100"></div>
                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                </h4>
            </div>

            <div class="col-md-6" style="padding-top: 50px">
                <img class="img" src="uploads/Icon_Details/Email.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="container mt-4 section-2">
        <div class="row">

            <div class="col-md-6" style="padding-top: 60px">
                <img class="img" src="uploads/Icon_Details/about.png" alt="">
            </div>

            <div class="col-md-6 mt-3" style="padding: 30px">
                <h2 class="text-center">Send a Message</h2>
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



@endsection
