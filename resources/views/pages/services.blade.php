@extends('layouts.app')
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


    <!-- service-style-two -->
    <section class="service-style-two about-page p_relative">
        <div class="pattern-layer">
            <div class="pattern-1 p_absolute l_20 b_20"
                 style="background-image: url(assets/images/shape/shape-18.png);"></div>
            <div class="pattern-2 p_absolute t_20 r_20"
                 style="background-image: url(assets/images/shape/shape-19.png);"></div>
        </div>
        <div class="auto-container">

            <div class="row clearfix">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{$service->getImage($service->image)}}" alt="">
                                    <a href="{{route("client.service", $service->slug)}}"><i class="fas fa-link"></i></a>
                                </figure>
                                <div class="lower-content">
                                    <h3><a href="{{route("client.service", $service->slug)}}">{{$service->title}}</a></h3>
                                    <div class="link p_relative d_block"><a href="{{route("client.service", $service->slug)}}">{{__("site.Read More")}}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service-style-two end -->

@endsection
