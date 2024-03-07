@extends('layouts.site_master')

@section('page_title', $page->name)

@section('seo')
    @include('site.pages.seo')
@endsection

@section('css')
    @if ($page->css)
        <style>
            {!! $page->css !!}
        </style>
    @endif
@endsection

@section('content')
<div class="dark:bg-color-14 relative font-Figtree">

    <div class="page-section-bg">
        <p class="text-center text-36 md:text-48 text-white font-bold -mt-[74px] pt-[118px] md:pt-[132px]">{{ $page->name }}</p>
        <div class="flex justify-center pb-[59px] px-5">
            @if( !is_null($page->updated_at) )
                <p class="text-center text-16 md:text-18 text-white font-normal mt-3 w-[700px]">{{ __('Last Modified: :x', ['x' => formatDate($page->updated_at)]) }}</p>
            @endif
        </div>
    </div>

    @if ($page->css)
        <div class="px-5 md:px-20 6xl:px-[200px] 8xl:px-[480px] dark:text-white min-h-[50vh] page-description">
            {!! $page->description !!}
        </div>
    @else
        <section class="text-gray-600 body-font">

            <div class="px-5 md:px-20 6xl:px-[200px] 8xl:px-[480px] dark:text-white">
                {!! $page->description !!}
            </div>

        </section>
    @endif
</div>
@endsection

