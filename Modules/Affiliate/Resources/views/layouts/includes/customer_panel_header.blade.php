@if (auth()->user()->role()->slug == 'admin' || !empty(auth()->user()->affiliateUser()->activeUser()->first()))
    <div>
        <a href="{{ auth()->user()->role()->slug == 'admin' ? route('admin.affiliate.dashboard') : route('site.affiliate.dashboard') }}"
           class="flex justify-center gap-2 items-center text-white hover:text-color-FC mr-5 md:mr-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                 fill="none">
                <g clip-path="url(#clip0_269_443)">
                    <path
                        d="M11.3334 4.66667L10.3934 5.60667L12.1134 7.33333H5.33337V8.66667H12.1134L10.3934 10.3867L11.3334 11.3333L14.6667 8L11.3334 4.66667ZM2.66671 3.33333H8.00004V2H2.66671C1.93337 2 1.33337 2.6 1.33337 3.33333V12.6667C1.33337 13.4 1.93337 14 2.66671 14H8.00004V12.6667H2.66671V3.33333Z"
                        fill="currentColor"></path>
                </g>
                <defs>
                    <clipPath id="clip0_269_443">
                        <rect width="16" height="16" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <span class="font-normal text-[15px] leading-[22px] line-clamp-single">{{ __('Affiliate Panel') }}</span>
        </a>
    </div>
@endif
