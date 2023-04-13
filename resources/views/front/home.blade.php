@extends('front.layout.app')
@section('title','Home | Rasalina')
@section('content')

    <!-- banner-area -->
    @include('front.HomeComponent.HomeBanner')
    <!-- banner-area-end -->

    <!-- about-area -->
    @include('front.HomeComponent.HomeAbout')
    <!-- about-area-end -->

    <!-- services-area -->
    @include('front.HomeComponent.HomeServices')
    <!-- services-area-end -->

    <!-- work-process-area -->
    @include('front.HomeComponent.HomeWork')
    <!-- work-process-area-end -->

    <!-- portfolio-area -->
    {{-- @include('front.HomeComponent.portfolio') --}}
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    {{-- @include('front.HomeComponent.HomePartner') --}}
    <!-- partner-area-end -->

    <!-- testimonial-area -->
    {{-- @include('front.HomeComponent.HomeTestimonial') --}}
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    {{-- @include('front.HomeComponent.HomeBlog') --}}
    <!-- blog-area-end -->

    <!-- contact-area -->
    @include('front.homeComponent.HomeContact')
    <!-- contact-area-end -->

@endsection
