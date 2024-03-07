@extends('affiliate::layouts.master')

{{-- All the contents will be placed here --}}
@section('parent-content')
    @yield('content')
@endsection

{{-- All the styles will be injected here --}}
@section('parent-css')
    @yield('css')
@endsection

{{-- All the scripts will be injected here --}}
@section('parent-js')
    @yield('js')
@endsection
