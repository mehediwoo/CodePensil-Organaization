@extends('front.layout.app')
@section('title','Service')
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Services Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            @if (!empty($icon) && $icon->count() > 0)
                @foreach ($icon as $icon)
                <li><img src="{{ asset('storage/'.$icon->icon) }}" alt=""></li>
                @endforeach
            @endif
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- services-details-area -->
<section class="services__details mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src="{{ asset('storage/'.$service->image) }}" alt="">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ $service->title }}</h2>
                    <p>
                        {!! $service->description !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                    <div class="widget">
                        <h5 class="title">Get in Touch</h5>
                        <form action="#" class="sidebar__contact">
                            <input type="text" placeholder="Enter name*">
                            <input type="email" placeholder="Enter your mail*">
                            <textarea name="message" id="message" placeholder="Massage*"></textarea>
                            <button type="submit" class="btn">send massage</button>
                        </form>
                    </div>
                    <div class="widget">
                        <h5 class="title">Contact Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Address :</span> {{ $setting->address }}</li>
                            <li><span>Mail :</span> {{ $setting->email }}</li>
                            <li><span>Phone :</span> {{ $setting->number }}</li>
                        </ul>
                        <ul class="sidebar__contact__social">
                            <li><a href="{{ $setting->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $setting->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $setting->linkedIn_url }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $setting->instagram_url }}"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- services-details-area-end -->


<!-- contact-area -->
@include('front.homeComponent.HomeContact')
<!-- contact-area-end -->
@endsection
