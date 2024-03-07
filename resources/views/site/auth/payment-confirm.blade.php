@extends('layouts.master')
@section('child-content')
    <div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
        <div class="absolute h-[52px] justify-start pl-5 w-full right-6 top-6">
            <label for="switch" class="flex items-center cursor-pointer float-right">
                <div class="relative">
                    <input type="checkbox" id="switch" class="sr-only switched">
                    <div class="block bg-color-DF dark:bg-[#FF774B] border border-color-89 dark:border-[#FF774B] w-9 h-5 rounded-full"></div>
                    <div class="dot absolute left-[2px] top-[2px] bg-white w-4 h-4 rounded-full transition"></div>
                </div>
                <div class="ml-3 hide dark:text-white text-color-14 font-normal text-base leading-6">
                    <span class="dark:text-[#333332] dark:hidden">{{ __('Dark Mode')}}</span>
                    <span class="dark:text-white text-white dark:flex hidden">{{ __('Light Mode')}}</span>
                </div>
            </label>
        </div>
        @php
            $logoLight = App\Models\Preference::getFrontendLogo('light');
            $logoDark = App\Models\Preference::getFrontendLogo('dark');
        @endphp
        <img class="mt-11 dark:hidden" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-11 hidden dark:block" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
        <div class="relative bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-[310px] px-4 sm:px-10 py-8 z-[2] mt-11">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                    <g clip-path="url(#clip0_1308_1905)">
                    <path d="M3.42278 79.8281L47.3447 61.7656C48.5478 61.2656 48.9697 59.7969 48.2353 58.5781C46.1884 55.125 41.8915 48.4219 36.4384 42.9688C31.1572 37.6875 24.7509 33.6563 21.4072 31.7188C20.1884 31.0156 18.7353 31.4375 18.2509 32.625L0.172779 76.5938C-0.608471 78.5 1.5009 80.625 3.42278 79.8281Z" fill="url(#paint0_linear_1308_1905)"/>
                    <path d="M21.6875 72.3281L11.4219 76.5469L3.46875 68.5781L7.6875 58.3281L21.6875 72.3281Z" fill="#FCCA19"/>
                    <path d="M40.2656 64.6719L30.0156 68.8906L11.1094 50L15.3281 39.7344L40.2656 64.6719Z" fill="#FCCA19"/>
                    <path d="M38.1412 41.5312C37.9537 41.3437 37.9381 41.0313 38.1099 40.8125L55.1724 20.1562L59.5162 24.5L38.8599 41.5625C38.6568 41.7344 38.3443 41.7187 38.1412 41.5312Z" fill="#E22861"/>
                    <path d="M41.4219 44.3594C43.9532 42.1563 55.5938 32.6094 66.8125 34.1094L66.9219 40.9844C66.9219 40.9844 57.8126 36.7344 42.1407 45.3906C41.8907 45.5313 41.5938 45.4844 41.3907 45.2813C41.1407 45.0469 41.1407 44.6406 41.375 44.3906C41.3907 44.375 41.4063 44.3594 41.4219 44.3594Z" fill="url(#paint1_linear_1308_1905)"/>
                    <path d="M35.3133 38.2656C37.5164 35.7344 47.0633 24.0938 45.5633 12.875L38.6883 12.7656C38.6883 12.7656 42.9539 21.875 34.282 37.5469C34.1414 37.7969 34.1883 38.0938 34.3914 38.2969C34.6414 38.5469 35.032 38.5469 35.282 38.2969C35.2976 38.2813 35.3133 38.2656 35.3133 38.2656Z" fill="#FCCA19"/>
                    <path d="M66.3906 13.3906C64.7969 15.9687 64.8125 18.5156 66.3906 21.0938C66.4063 21.125 66.4062 21.1719 66.375 21.1875C66.3594 21.2031 66.3281 21.2031 66.3125 21.1875C63.7188 19.5625 61.1719 19.5938 58.5781 21.1875C58.5469 21.2031 58.5 21.2031 58.4844 21.1719C58.4688 21.1562 58.4688 21.125 58.4844 21.1094C60.1094 18.5156 60.0938 15.9844 58.5 13.375C58.4844 13.3437 58.4844 13.2969 58.5156 13.2812C58.5313 13.2656 58.5625 13.2656 58.5938 13.2812C61.1719 14.8906 63.7031 14.8906 66.2969 13.2969C66.3281 13.2656 66.3594 13.2656 66.3906 13.2969C66.4219 13.3125 66.4219 13.3594 66.3906 13.3906Z" fill="#E22861"/>
                    <path d="M79.9378 39.4531C76.9221 39.75 74.9221 41.3125 73.8284 44.1562C73.8128 44.1875 73.7815 44.2031 73.7346 44.1875C73.7034 44.1719 73.6878 44.1562 73.6878 44.125C73.3909 41.0781 71.8284 39.0781 68.9846 38C68.9534 37.9844 68.9378 37.9531 68.9534 37.9062C68.969 37.875 68.9846 37.8594 69.0159 37.8594C72.0628 37.5781 74.0628 36.0156 75.1565 33.1719C75.1721 33.1406 75.2034 33.125 75.2503 33.1406C75.2815 33.1562 75.2971 33.1719 75.2971 33.2031C75.594 36.2344 77.1409 38.2344 79.969 39.3281C80.0003 39.3437 80.0159 39.3906 80.0003 39.4219C79.969 39.4375 79.9534 39.4531 79.9378 39.4531Z" fill="url(#paint2_linear_1308_1905)"/>
                    <path d="M40.5471 0.0624957C40.2346 3.07812 38.6878 5.09375 35.844 6.17187C35.8128 6.1875 35.7971 6.21875 35.8128 6.26562C35.8284 6.29687 35.844 6.3125 35.8753 6.3125C38.9221 6.59375 40.9221 8.17187 42.0003 11.0156C42.0159 11.0469 42.0471 11.0625 42.094 11.0469C42.1253 11.0312 42.1409 11.0156 42.1409 10.9844C42.4221 7.9375 43.9846 5.9375 46.8284 4.84375C46.8596 4.82812 46.8753 4.79687 46.8596 4.75C46.844 4.71875 46.8284 4.70312 46.7971 4.70312C43.7659 4.40625 41.7659 2.85937 40.6721 0.0312457C40.6565 -4.27058e-06 40.6253 -0.0156293 40.594 -4.27011e-06C40.5628 0.0156207 40.5471 0.0312457 40.5471 0.0624957Z" fill="#FCCA19"/>
                    <path d="M62.6094 52.9531L62.2032 54.4844C62.1563 54.6406 62.2032 54.8281 62.3282 54.9375L63.4532 56.0469C63.6407 56.2344 63.6407 56.5156 63.4688 56.7031C63.4063 56.7656 63.3282 56.8125 63.2501 56.8281L61.7188 57.2344C61.5469 57.2812 61.4219 57.4062 61.3907 57.5625L60.9844 59.0937C60.9219 59.3437 60.6719 59.5 60.4219 59.4375C60.3282 59.4219 60.2501 59.375 60.2032 59.3125L59.0938 58.2031C58.9688 58.0781 58.7969 58.0312 58.6407 58.0781L57.1094 58.4844C56.8594 58.5625 56.5938 58.4062 56.5313 58.1562C56.5001 58.0781 56.5001 57.9844 56.5313 57.8906L56.9376 56.3594C56.9844 56.2031 56.9376 56.0156 56.8126 55.9062L55.7032 54.7969C55.5157 54.6094 55.5157 54.3281 55.6876 54.1406C55.7501 54.0781 55.8282 54.0312 55.9063 54.0156L57.4376 53.6094C57.5938 53.5625 57.7344 53.4375 57.7657 53.2812L58.1719 51.75C58.2344 51.5 58.4844 51.3437 58.7344 51.4062C58.8126 51.4219 58.8907 51.4687 58.9532 51.5312L60.0782 52.6406C60.2032 52.7656 60.3751 52.8125 60.5313 52.7656L62.0626 52.3594C62.3126 52.2812 62.5782 52.4375 62.6407 52.6719C62.6251 52.7812 62.6251 52.875 62.6094 52.9531Z" fill="#FCCA19"/>
                    <path d="M29.0938 19.4375L28.6876 20.9687C28.6407 21.125 28.6876 21.3125 28.8126 21.4219L29.9219 22.5469C30.1094 22.7344 30.1094 23.0156 29.9376 23.2031C29.8751 23.2656 29.7969 23.3125 29.7188 23.3281L28.1876 23.7344C28.0313 23.7812 27.8907 23.9062 27.8594 24.0625L27.4532 25.5937C27.3907 25.8437 27.1407 26 26.8907 25.9375C26.8126 25.9219 26.7344 25.875 26.6719 25.8125L25.5626 24.7031C25.4376 24.5781 25.2657 24.5312 25.1094 24.5781L23.5782 24.9844C23.3282 25.0625 23.0626 24.9062 23.0001 24.6719C22.9688 24.5937 22.9688 24.5 23.0001 24.4062L23.4063 22.875C23.4532 22.7187 23.4063 22.5312 23.2813 22.4219L22.1719 21.3125C21.9844 21.1406 21.9844 20.8437 22.1563 20.6562C22.2188 20.5937 22.2969 20.5469 22.3751 20.5312L23.9063 20.125C24.0626 20.0781 24.2032 19.9531 24.2344 19.7812L24.6407 18.25C24.7032 18 24.9532 17.8437 25.2032 17.9062C25.2813 17.9219 25.3594 17.9687 25.4219 18.0312L26.5313 19.1562C26.6563 19.2812 26.8282 19.3281 26.9844 19.2812L28.5157 18.875C28.7657 18.7969 29.0313 18.9531 29.0938 19.2031C29.1094 19.2656 29.1094 19.3594 29.0938 19.4375Z" fill="url(#paint3_linear_1308_1905)"/>
                    </g>
                    <defs>
                    <linearGradient id="paint0_linear_1308_1905" x1="31.5992" y1="74.0156" x2="14.714" y2="35.9353" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_1308_1905" x1="57.9241" y1="44.0534" x2="55.8621" y2="33.6656" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_1308_1905" x1="76.1376" y1="42.8325" x2="72.2987" y2="34.1694" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_1308_1905" x1="27.2536" y1="24.9594" x2="24.4507" y2="18.6527" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <clipPath id="clip0_1308_1905">
                    <rect width="80" height="80" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
            </div>
            <p class="text-center text-24 font-bold text-color-14 dark:text-white mt-6">{{ __('Payment Confirmed')}}</p>

            <p class="text-center text-14 font-normal text-color-14 dark:text-white mt-4">{{ __('You have successfully paid for your subscription plan. Enjoy!')}}</p>
            <a class="block w-full bg-color-14 dark:bg-white dark:text-color-14 text-white text-16 font-semibold py-3 rounded-xl text-center mt-6" href="javascript: void(0)">{{ __('Back to Dashboard')}}</a>
        </div>
    </div>


    <div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
        <div class="absolute h-[52px] justify-start pl-5 w-full right-6 top-6">
            <label for="switch" class="flex items-center cursor-pointer float-right">
                <div class="relative">
                    <input type="checkbox" id="switch" class="sr-only switched">
                    <div class="block bg-color-DF dark:bg-[#FF774B] border border-color-89 dark:border-[#FF774B] w-9 h-5 rounded-full"></div>
                    <div class="dot absolute left-[2px] top-[2px] bg-white w-4 h-4 rounded-full transition"></div>
                </div>
                <div class="ml-3 hide dark:text-white text-color-14 font-normal text-base leading-6">
                    <span class="dark:text-[#333332] dark:hidden">{{ __('Dark Mode')}}</span>
                    <span class="dark:text-white text-white dark:flex hidden">{{ __('Light Mode')}}</span>
                </div>
            </label>
        </div>
        @php
            $logoLight = App\Models\Preference::getFrontendLogo('light');
            $logoDark = App\Models\Preference::getFrontendLogo('dark');
        @endphp
        <img class="mt-11 dark:hidden" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-11 hidden dark:block" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
        <div class="relative bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-[310px] px-4 sm:px-10 py-8 z-[2] mt-11">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                    <g clip-path="url(#clip0_2455_1682)">
                    <path d="M0.860291 65.5908L34.8281 8.18232C37.1647 4.23325 42.8355 4.23325 45.172 8.18232L79.1398 65.5908C81.5358 69.6401 78.6433 74.7792 73.9679 74.7792H6.03217C1.35685 74.7794 -1.53565 69.6403 0.860291 65.5908Z" fill="url(#paint0_linear_2455_1682)"/>
                    <path d="M28.2656 74.7793H73.9687C78.6441 74.7793 81.5367 69.6403 79.1406 65.5909L54.3225 23.6458C55.3055 27.8389 55.7795 32.5833 55.2644 37.7581C52.827 62.2414 30.5283 73.6567 29.0836 74.3656C28.8061 74.5093 28.5344 74.6461 28.2656 74.7793Z" fill="url(#paint1_linear_2455_1682)"/>
                    <path d="M6.03168 69.9609C5.04293 69.9269 4.49324 69.01 5.01574 68.0605L38.9834 10.652C39.5082 9.82936 40.505 9.84014 41.0154 10.652L74.9831 68.0603C75.5078 69.0134 74.9626 69.9262 73.9671 69.9608H6.03168V69.9609Z" fill="#FCCA19"/>
                    <path d="M55.4451 35.0408C55.4134 35.9328 55.3545 36.8383 55.2629 37.7581C53.6418 54.0426 43.2354 64.5439 36.0215 69.9609H73.9663C74.9618 69.9264 75.5069 69.0136 74.9823 68.0605L55.4451 35.0408Z" fill="#FCCA19"/>
                    <path d="M40.0006 52.3343C39.14 52.3343 38.4239 51.6731 38.3555 50.8153L36.7683 30.9218C36.6178 29.0353 38.1081 27.4212 40.0006 27.4212C41.8931 27.4212 43.3836 29.0353 43.233 30.9218L41.6458 50.8153C41.5773 51.6731 40.8613 52.3343 40.0006 52.3343Z" fill="#141414"/>
                    <path d="M40.0001 62.2367C41.4315 62.2367 42.592 61.0762 42.592 59.6448C42.592 58.2133 41.4315 57.0529 40.0001 57.0529C38.5686 57.0529 37.4082 58.2133 37.4082 59.6448C37.4082 61.0762 38.5686 62.2367 40.0001 62.2367Z" fill="#141414"/>
                    </g>
                    <defs>
                    <linearGradient id="paint0_linear_2455_1682" x1="52.0138" y1="66.2179" x2="30.1439" y2="9.45661" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_2455_1682" x1="61.9025" y1="68.4858" x2="44.2925" y2="28.2782" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84"/>
                    <stop offset="1" stop-color="#FFCF4B"/>
                    </linearGradient>
                    <clipPath id="clip0_2455_1682">
                    <rect width="80" height="80" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
            </div>
            <p class="text-center text-24 font-bold text-color-14 dark:text-white mt-6">{{ __('Payment Failed')}}</p>

            <p class="text-center text-14 font-normal text-color-14 dark:text-white mt-4">{{ __('Oops! Looks like your payment was unsuccessful. Please try again or contact our support team to assist you.')}}</p>
            <a class="block w-full bg-color-14 dark:bg-white dark:text-color-14 text-white text-16 font-semibold py-3 rounded-xl text-center mt-6" href="javascript: void(0)">{{ __('Try Again')}}</a>
        </div>
    </div>
@endsection
