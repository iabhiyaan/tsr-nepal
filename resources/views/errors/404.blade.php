@extends('front.layouts.app')

@section('content')

@push('styles')
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            } */
            .give-heigh {
              height: 429px;
            }
        </style>

@endpush


<section class="blog-listing-page">
    <div class="container">


        <div class="give-heigh" style="height:414px;">
          <h2 style="color:red;text-align:center;">  404 | NOT FOUND </h2>
        </div>


        </div>
    </section>
        <!-- <div class="flex-center position-ref full-height">
            <div class="code">
                404
            </div>

            <div class="message" style="padding: 10px;">
                Not Found            </div>
        </div> -->

@endsection
