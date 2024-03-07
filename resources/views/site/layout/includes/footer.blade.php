@php
    // column count
    $count = 0;
    if (isset($footer['main'])) {
        foreach ($footer['main'] as $key => $value) {
            if (is_array($value) && $value['status']) {
                $count++;
            }
        }
    }
@endphp

@php
    $direction = ['left' => 'justify-start', 'center' => 'justify-center', 'right' => 'justify-end'];
    $class = Request::url() == url('/') ||  Request::url() == route('site.page', ['slug' => request('slug') ?? 'demo'])  ? 'md:dark:bg-transparent md:bg-transparent md:pt-[167px] pt-[237px]' : 'bg-color-14 pt-9';
@endphp


<div class="bg-color-F6 dark:bg-color-29 w-full {{ $class }}" style="background: {{ isset($footer['main']['bg_color']) ? $footer['main']['bg_color'] : '' }}">
    <footer class="relative">
        @if ($count)
            <div class="9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 m-auto flex flex-wrap lg:flex-nowrap gap-7 pb-[30px] {{ $direction[$footer['main']['direction']] }}" style="color: {{ isset($footer['main']['text_color']) ? $footer['main']['text_color'] : '' }};">
                @if (isset($footer['main']['about_us']['status']) && $footer['main']['about_us']['status'] == 1)
                <div class="w-full sm:w-1/3 md:w-1/5 order-{{ isset($footer['main']['about_us']['sort']) ? $footer['main']['about_us']['sort'] : 1 }}">
                    @if($footerLogoLight->image && $footerLogoDark->image)
                    <a href="#">
                        <img class="w-[157px] h-[42px] dark:hidden neg-transition-scale object-contain"
                            src="{{ $footerLogoLight->fileUrl()  }}"
                            alt="{{ __('Image') }}">
                            <img class="w-[157px] h-[42px] dark:block hidden neg-transition-scale object-contain"
                            src="{{ $footerLogoDark->fileUrl() }}"
                            alt="{{ __('Image') }}">
                    </a>
                    @endif
                    <div class="flex gap-3 flex-wrap mt-10">
                        @if (isset($footer['main']['about_us']['data']['social_data']))
                            @foreach ($footer['main']['about_us']['data']['social_data'] as $data)
                                @if (!empty($data['link']))
                                    <a href="{{ $data['link'] }}"
                                        class="bg-white share-button-hover text-color-14 flex items-center justify-center w-8 h-8 bg-gray-3 rounded-full social-transition cursor-pointer" title="{{ ucfirst($data['label']) }}" target="_blank">
                                        @include('site.landing_page.landing-sub-layout.partials.svg.social-icons', ['social' => $data['label']])
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
                @if (isset($footer['main']))
                    @foreach ($footer['main'] as $key => $value)
                        @if (in_array($key, ['useful_links', 'pages', 'resource_links', 'support_links']) && $value['status'])
                            <div class="w-[45%] sm:w-1/3 md:w-1/5 grid lg:justify-center justify-start order-{{ $value['sort'] }}">
                                <ul class="gap-2.5 flex flex-col break-words lg:mt-5 mt-4 pb-3">
                                    <li class="font-bold mb-1.5 text-18 font-RedHat text-color-14 dark:text-white break-worda" style="color: {{ isset($footer['main']['text_color']) ? $footer['main']['text_color'] : '' }};">
                                        {!! $value['title'] !!}
                                    </li>
                                    @foreach ($value['data'] ?? [] as $widget)
                                        <li class="text-14 text-color-14 dark:text-white font-normal font-Figtree cursor-pointer break-words" style="color: {{ isset($footer['main']['text_color']) ? $footer['main']['text_color'] : '' }};">
                                            @php  
                                                $siteUrl = URL::to('/');
                                            @endphp
                                            <a href="{{ $widget['link'] }}" class="inline-block">
                                                {!! $widget['label']  !!} 
                                                @if( !stristr($widget['link'], $siteUrl))
                                                &nbsp
                                                <svg class="inline-block" width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H13V4H18.5858L10.2929 12.2929C9.90237 12.6834 9.90237 13.3166 10.2929 13.7071C10.6834 14.0976 11.3166 14.0976 11.7071 13.7071L20 5.41421V11H22V2Z" fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.90036 5.04616C7.39907 5.00096 8.04698 5 9 5C9.55228 5 10 4.55229 10 4C10 3.44772 9.55228 3 9 3L8.95396 3C8.05849 2.99998 7.31952 2.99997 6.71983 3.05432C6.09615 3.11085 5.52564 3.23242 5 3.5359C4.39192 3.88697 3.88697 4.39192 3.5359 5C3.23242 5.52564 3.11085 6.09615 3.05432 6.71983C2.99997 7.31953 2.99998 8.05851 3 8.95399V14.0705C2.99996 15.4247 2.99993 16.5413 3.11875 17.4251C3.24349 18.3529 3.51546 19.1723 4.17157 19.8284C4.82768 20.4845 5.64711 20.7565 6.57494 20.8813C7.4587 21.0001 8.57532 21 9.92945 21H15.046C15.9415 21 16.6805 21 17.2802 20.9457C17.9039 20.8892 18.4744 20.7676 19 20.4641C19.6081 20.113 20.113 19.6081 20.4641 19C20.7676 18.4744 20.8891 17.9039 20.9457 17.2802C21 16.6805 21 15.9415 21 15.046L21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15C19 15.953 18.999 16.6009 18.9538 17.0996C18.9099 17.5846 18.8305 17.8295 18.732 18C18.5565 18.304 18.304 18.5565 18 18.7321C17.8295 18.8305 17.5846 18.9099 17.0996 18.9538C16.6009 18.999 15.953 19 15 19H10C8.55752 19 7.57625 18.9979 6.84143 18.8991C6.13538 18.8042 5.80836 18.6368 5.58579 18.4142C5.36321 18.1916 5.19584 17.8646 5.10092 17.1586C5.00212 16.4237 5 15.4425 5 14V9C5 8.04698 5.00096 7.39908 5.04616 6.90036C5.09011 6.41539 5.1695 6.17051 5.26795 6C5.44348 5.69596 5.69596 5.44349 6 5.26795C6.17051 5.16951 6.41539 5.09011 6.90036 5.04616Z" fill="currentColor"></path>
                                                </svg>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endif
        @if ($footer['bottom']['status'])
        <div class="9xl:px-[310px] 8xl:px-40 md:px-10 px-5 m-auto" style="background: {{ isset($footer['bottom']['bg_color']) ? $footer['bottom']['bg_color'] : '' }}">
            <div class="border-t border-color-DF dark:border-color-47" style="border-top: 1px solid {{ $footer['bottom']['border_top'] }};">
                <div class="py-4 flex {{ $direction[$footer['bottom']['position']] }} items-start sm:items-center text-14 text-color-14 dark:text-white font-normal font-Figtree" style="color: {{ isset($footer['bottom']['text_color']) ? $footer['bottom']['text_color'] : '' }};">
                    <p>{!! isset($footer['bottom']['title']) ? $footer['bottom']['title'] : '' !!}</p>
                </div>
            </div>
        </div>

        @endif
    </footer>
</div>
