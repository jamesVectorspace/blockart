{{-- This is a child template layout file for the site namespace. Only include codeblocks related this namespace files --}}

@php
    $themeOption = \Modules\CMS\Http\Models\ThemeOption::with('image')->get();

    $layout = 'default';
    $header = option($layout . '_template_header', '');
    $footer = option($layout . '_template_footer', '');

    $layout = 'default';
    if (!isset($page->layout)) {
        $page = \Modules\CMS\Entities\Page::firstWhere('default', '1');
    }
    $layout = $page->layout;

    $headerLogoLight = $themeOption->where('name', $layout . '_template_header_logo_light')->first();
    $headerLogoDark = $themeOption->where('name', $layout . '_template_header_logo_dark')->first();
    $footerLogoLight = $themeOption->where('name', $layout . '_template_footer_logo_light')->first();
    $footerLogoDark = $themeOption->where('name', $layout . '_template_footer_logo_dark')->first();
@endphp

{{-- Extending master layout --}}
@extends('layouts.master')


@section('child-head')
    {{-- Include seo or other head tags here --}}
    @yield('head')
    @yield('seo')
@endsection

@section('child-css')
    {{-- All the site styles will be injected here --}}

    @yield('css')
    @stack('styles')
@endsection


@section('child-content')
    @include('site.layout.includes.header')
    @yield('content')
    @include('site.layout.includes.footer')
@endsection

@section('child-js')
    <script src="{{ asset('public/frontend/assets/js/header.min.js') }}"></script>

    {{-- All the site scripts will be injected here --}}
    @yield('js')
    @stack('scripts')
@endsection
