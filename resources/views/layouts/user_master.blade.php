{{-- This is a child template layout file for the user namespace. Only include codeblocks related this namespace files --}}

{{-- Extending master layout --}}
@extends('layouts.master')


@section('child-head')
    @yield('head')
@endsection

@section('child-css')
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/tom-select/tom-select.min.css') }}" />
    {{-- All the user styles will be injected here --}}
    @yield('css')
    @stack('styles')
@endsection


@section('child-content')
    @include('user.includes.header')

    <div class="flex relative bg-white dark:bg-[#333332] font-Figtree">

        {{-- sidebar-main --}}
        @include('user.includes.sidebar-main')

        @yield('content')
    </div>
    @include('user.includes.user-loader')
@endsection

@section('child-js')
    {{-- All the user scripts will be injected here --}}
    <script src="{{ asset('public/assets/plugin/tom-select/tom-select.complete.min.js') }}"></script>
    <script>
        var ACCESS_TOKEN = "{{ !empty($accessToken) ? $accessToken : '' }}";
        var copy = "{{ __('Copy Code') }}";
    </script>
    <script src="{{ asset('public/assets/js/user/sidebar.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/user/main.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/sweet-alert2.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/waversurferjs/waversurfer.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/waversurferjs/wavesurfer-cursor.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/waversurferjs/waversurfer-timeline.min.js') }}"></script>
    <script src="{{ asset('Modules/OpenAI/Resources/assets/js/openai.min.js') }}"></script>
    <script src="{{ asset('Modules/OpenAI/Resources/assets/js/use-case.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/header.min.js') }}"></script>
    @yield('js')
    @stack('scripts')
@endsection
