@extends('front.layout.app')
@section('title', 'Contact | Rasalina')
@section('content')

@include('front.contact.bredcamp')

{{-- Map --}}
@include('front.contact.map')

{{-- Contact Message --}}
@include('front.contact.contact')
{{-- contact information --}}
@include('front.contact.info')
@endsection
