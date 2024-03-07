@if (auth()->user()->role()->slug == 'admin' || !empty(auth()->user()->affiliateUser()->activeUser()->first()))
<div class="py-2">
    <a href="{{ auth()->user()->role()->slug == 'admin' ? route('admin.affiliate.dashboard') : route('site.affiliate.dashboard') }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-[18px]">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2465_1852)">
                <path
                    d="M2 8.66667H7.33333V2H2V8.66667ZM2 14H7.33333V10H2V14ZM8.66667 14H14V7.33333H8.66667V14ZM8.66667 2V6H14V2H8.66667Z"
                    fill="currentColor" />
            </g>
            <defs>
                <clipPath id="clip0_2465_1852">
                    <rect width="16" height="16" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <p>{{ __('Affiliate Panel') }}
        </p>
    </a>
</div>
@endif
