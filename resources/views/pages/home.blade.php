@extends('layouts.app')
@include('partials._seo', ['code' => 'home'])
@section('content')

    <!-- banner-section -->
    <section class="banner-section p_relative">
        <div class="banner-carousel">
            <div class="slide-item p_relative">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url(assets/images/shape/shape-2.png);"></div>
                    <div class="pattern-2" style="background-image: url(assets/images/shape/shape-3.png);"></div>
                    <div class="eye-icon rotate-me" style="background-image: url(assets/images/icons/icon-1.png);"></div>
                </div>
                <div class="auto-container">
                    <div class="banner-content p_relative d_block">
                        <div class="content-box p_relative d_block z_5">
                            <h3>{{$hero->mini_title}}</h3>
                            <h2 class="p_relative d_block fs_70 lh_80 fw_bold">{{$hero->title}}</h2>
                            <p class="p_relative d_block fs_18">{{$hero->subtitle}}</p>
                            <div class="btn-box">
                                <a href="contact.html" class="theme-btn btn-one">{{__('site.contact_now')}}</a>
                            </div>
                            <ul class="icon-list clearfix">
                                <li><i class="icon-8"></i></li>
                                <li><i class="icon-9"></i></li>
                                <li><i class="icon-10"></i></li>
                                <li><i class="icon-11"></i></li>
                            </ul>
                        </div>
                        <div class="image-box">
                            <div class="shape">
                                <div class="shape-1" style="background-image: url(assets/images/shape/shape-1.png);"></div>
                                <div class="shape-2"></div>
                            </div>
                            <figure class="image"><img src="{{$hero->getImage($hero->image)}}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- banner-section end -->




    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_one">
                        <div class="image-box mr_30 pr_130 pb_100">
                            <div class="shape" style="background-image: url(assets/images/shape/shape-1.png"></div>
                            <figure class="image"><img src="assets/images/resource/about-1.jpg" alt=""></figure>
                            <div class="text p_absolute r_0 b_0">
                                <h2>{{$who->image_subbox_text_top}}</h2>
                                <h4>{{$who->image_subbox_text_bottom}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_one">
                        <div class="content-box ml_30">
                            <div class="sec-title left p_relative d_block mb_25">
                                <span class="sub-title">{{__('site.Who We Are?')}}</span>
                                <h2>{{$who->title}}</h2>
                            </div>
                            <div class="text p_relative d_block">
                                <p>{{$who->text}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- service-section -->
    <section class="service-section p_relative bg-color-1">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-4.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-5.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">{{__("site.My Services")}}</span>
                <h2>{{__("site.My Services_subtitle")}}</h2>
            </div>
            <div class="tabs-box">
                <div class="tab-btn-box p_relative d_block mb_70 centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        @foreach($services as $service)
                            <li class="tab-btn {{ $loop->first ? 'active-btn' : '' }}" data-tab="#tab-{{ $service->id }}">
                                <h4>{{ $service->title }}</h4>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tabs-content">
                    @foreach($services as $service)
                        <div class="tab {{ $loop->first ? 'active-tab' : '' }}" id="tab-{{ $service->id }}">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                        <div class="content_block_two">
                                            <div class="content-box">
                                                <div class="text">
                                                    <h3>{{ $service->title }}</h3>
                                                    <div>
                                                        {!! $service->text !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                        <div class="image_block_two">
                                            <div class="image-box p_relative d_block">
                                                <figure class="image p_relative d_block">
                                                    <img src="{{ $service->getImage($service->image) }}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- service-section end -->








    <!-- testimonial-section -->
    <section class="testimonial-section p_relative centred">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-6.png);"></div>
        <div class="auto-container">
            <div class="sec-title mb_60">
                <span class="sub-title">{{__('site.Testimonials')}}</span>
                <h2>{{__('site.What Our Client Say About Optcare')}}</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div style="display: flex; align-items: center; justify-content: center" class="icon-box">
                                <img  width="70" height="70px" style="border-radius: 100%;"  src="{{$testimonial->getImage($testimonial->image)}}">
                            </div>
                            <h4> {{$testimonial->full_name}}</h4>
                            <div>
                                {{$testimonial->text}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- contact-section -->
    <section class="contact-section p_relative">
        <div class="bg-layer"></div>
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-7.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-8.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred light mb_45">
                <span class="sub-title">{{__('site.Emergency Help')}}</span>
                <h2>{{__("Need a Doctor for Check-up? Call for an Emergency Service!")}}</h2>
            </div>
            <div  class="support-box p_relative centred">
                <div class="icon-box"><img src="assets/images/icons/icon-2.png" alt=""></div>
                <h3 style="color: white" >{{__("site.Call")}}: <a style="color: white" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{$phone}}</a></h3>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h3 style="color: white">{!! __('site.contact_title') !!}</h3>
                        <form id="appointmentForm" class="default-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="{{__('site.Your Name')}}" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="{{__("site.Email")}}" required="">
                            </div>

                            <!-- Tarih ve Saat Alanlarını Yan Yana Gösterme -->
                            <div class="form-group" style="display: flex; gap: 10px;">
                                <div style="flex: 1; position: relative;">
                                    <div class="icon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"><i class="far fa-angle-down"></i></div>
                                    <input type="text" name="date" placeholder="{{ __("site.Appointment date") }}" id="datepicker" style="width: 100%;">
                                </div>
                                <div style="flex: 1;">
                                    <input type="text" name="time" placeholder="{{ __('site.Appointment time') }}" class="timepicker" required="" style="width: 100%;">
                                </div>
                            </div>

                            <div class="form-group message-btn">
                                <button type="button" id="submitBtn" class="theme-btn btn-two">{{ __('site.Make Appointment') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 video-column">
                    <div class="video-inner" style="background-image: url({{__($infos->getImage($infos->home_page_video_thumbnail))}});">
                        <div class="video-btn">
                            <a href="{{$infos->home_page_video}}" class="lightbox-image" data-caption=""><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->






    <!-- project-section -->
    <section style="margin-top: 30px" class="project-section p_relative">
        <div class="outer-container">
            <div class="project-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                @foreach($galleries as $gallery)
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{$gallery->getImage($gallery->image)}}" alt="{{$gallery->text}}"></figure>
                            <div class="view-btn"><a href="{{$gallery->getImage($gallery->image)}}" class="lightbox-image" data-fancybox="gallery"><i class="icon-33"></i></a></div>
                            <div class="text">
                                <span>{{$gallery->text}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- project-section end -->


    <!-- news-section -->
    <section class="news-section p_relative">
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">{{__("site.Articles")}}</span>
                <h2>{{__("site.blog_section_subtitle")}}</h2>
            </div>
            <div class="row clearfix">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{$blog->getImage($blog->imagefile)}}" alt="">
                                    <a href="{{route('client.blog', $blog->slug)}}"><i class="fas fa-link"></i></a>
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <div class="category"><a href="blog-details.html">{{$blog->category->title}}</a></div>
                                        <h3><a href="{{route('client.blog', $blog->slug)}}">{!! \Illuminate\Support\Str::limit($blog->title, 50, '...') !!}</a></h3>
                                        <ul class="post-info clearfix">
                                            <li><i class="icon-34"></i>{{ \Carbon\Carbon::parse($blog->date)->format('d/m/Y') }}</li>
                                        </ul>

                                        <div class="link"><a href="{{route('client.blog', $blog->slug)}}">{{__("site.Read More")}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news-section end -->


    <!-- google-map-section -->
    <section class="google-map-section p_relative">
        <div class="map-inner p_relative d_block">
            <div>
                {!! $infos->iframe !!}
            </div>
        </div>
        <div class="content-inner">
            <div class="auto-container">
                <div class="content-box p_relative d_block">
                    <div class="title p_relative d_block">
                        <h3>{{__("site.Working Hours")}}</h3>
                    </div>
                    <div class="schedule-box p_relative d_block">
                        <ul class="schedule-list clearfix">
                            @if($infos->work_hours_weekday)
                                <li>{{$infos->work_hours_weekday}}</li>
                            @endif
                            @if($infos->work_hours_saturday)
                                <li>{{$infos->work_hours_saturday}}</li>
                            @endif
                            @if($infos->work_hours_sunday)
                                <li>{{$infos->work_hours_sunday}}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="contact-info p_relative d_block">
                        <h3>{{__("site.Contact Info")}}</h3>
                        <ul class="info-list clearfix">
                            <li><i class="fas fa-envelope"></i><a href="mailto:{{$email}}">{{$email}}</a></li>
                            <li><i class="icon-3"></i><a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{$phone}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- google-map-section end -->

@endsection
@push('scripts')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function () {
            let form = document.getElementById('appointmentForm');
            let formData = new FormData(form);

            fetch('/api/appointments', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                                title: 'Appointment Created',
                            text: data.message
                        });
                        form.reset(); // Formu sıfırla
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: @json('There was an error creating the appointment')
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: @json('site.There was an error processing your request')
                    });
                });
        });
        // 24 saatlik formatta saat seçici oluştur
        flatpickr(".timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true // 24 saat formatını zorla
        });

        // Tarih seçici için de flatpickr'i başlatabilirsiniz
        flatpickr("#datepicker", {
            dateFormat: "m/d/Y"
        });
    </script>

@endpush
