@extends('front.layout.app')
@section('title','Rasalina | About')
@section('content')

{{-- Bread Camp --}}
@include('front.AboutComponent.Breadcamp')
{{-- About Banner --}}
@include('front.AboutComponent.AboutBanner')
{{-- About Service --}}
@include('front.AboutComponent.Service')

 {{-- Home Contact --}}
 @include('front.HomeComponent.HomeContact')

@endsection
