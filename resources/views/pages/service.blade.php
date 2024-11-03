@extends('layouts.app')
@include('partials._seo', ['blog' => $blog])
@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->contact_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__('site.Services')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">{{__('site.Home')}}</a></li>
                    <li>{{__('site.Services')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- service-details -->
    <section class="service-details p_relative">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="service-details-content">
                        <div class="content-one">
                            <div class="text">
                                <h2>{{$service->title}}</h2>
                                <div>
                                    {!! $service->text !!}
                                </div>
                            </div>
                            <figure class="image-box"><img src="assets/images/service/service-10.jpg" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-details end -->
@endsection
