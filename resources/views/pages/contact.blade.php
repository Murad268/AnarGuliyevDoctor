@extends('layouts.app')
@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->contact_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__("site.Contact Us")}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">{{__("site.Home")}}</a></li>
                    <li>{{__("site.Contact Us")}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- contact-info-section -->
    <section class="contact-info-section centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="icon-57"></i></div>
                        <p>{{$infos->address}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="icon-58"></i></div>
                        <p>
                            @foreach($emails as $email)
                                <a href="mailto:{{ $email->email }}">{{ $email->email }}</a><br />
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="icon-59"></i></div>
                        <p>
                            @foreach($phones as $phone)
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone->phone) }}">{{ $phone->phone }}</a><br />
                            @endforeach
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-style-two -->
    <section class="contact-style-two p_relative">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-55.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-56.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 big-column offset-lg-2">
                    <div class="form-inner">
                        <h2>{{__('site.Leave a Comment')}}</h2>
                        <form method="POST"
                              id="contact-form">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="{{__('site.Your Name')}}" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="{{__("site.Your email")}}" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" required="" placeholder="{{__("site.Phone")}}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" required="" placeholder="{{__("site.Subject")}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="{{__("site.Message")}}"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 centred">
                                    <button class="theme-btn btn-one" type="submit" name="submit-form">{{__("site.Submit Now")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-style-two end -->


    <!-- google-map-section -->
    <section class="google-map-section p_relative">
        <div class="map-inner p_relative d_block">
            <div>
                {!! $infos->iframe !!}
            </div>
        </div>
    </section>
    <!-- google-map-section end -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch("{{ url('/api/contact-form') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '{{ __("site.Submitted") }}',
                            text: data.message,
                        });
                        document.getElementById('contact-form').reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __("site.Error") }}',
                            text: '{{ __("site.Submission failed. Please try again.") }}',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: '{{ __("site.Error") }}',
                        text: '{{ __("site.Submission failed. Please try again.") }}',
                    });
                });
        });
    </script>
@endpush
