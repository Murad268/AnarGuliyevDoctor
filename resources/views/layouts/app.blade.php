<!DOCTYPE html>
<html lang="en">

@include('layouts.includes.head')


<!-- page wrapper -->
<body>

<div class="boxed_wrapper">


    <!-- preloader -->



    <x-client-header-component/>



    @yield('content')

    <x-client-footer-component/>



    <!-- scroll to top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fal fa-long-arrow-up"></i>
    </button>

</div>


@include('layouts.includes.foot')

</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.commonsupport.com/Optcare/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 18:27:30 GMT -->
</html>
