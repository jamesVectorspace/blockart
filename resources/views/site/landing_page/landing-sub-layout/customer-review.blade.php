@php
    $addons = \Modules\Addons\Entities\Addon::find('reviews');
@endphp

@if($addons->isEnabled())
    @php
        $userReviews = App\Models\User::getUserReviews();
        $ratingReport = Modules\Reviews\Entities\Review::getAvgRating();
        $index = count($userReviews)-1;
        $avgRating = formatDecimal($ratingReport->avgRating);
    @endphp

    @if(count($userReviews) > 0)
        <div>
            <div class="relative flex justify-center items-center 6xl:mt-[190px] mt-[100px]">
                <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">{{ __('customer reviews')}}
                </p>
            </div>
            <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center text-color-14 dark:text-white break-words px-5">{{ __('Used By Millions Around The Globe') }}
            </p>
            <p class="mt-3 font-Figtree text-color-14 dark:text-white font-normal text-center 6xl:text-18 text-16">{{ __('See what other people are saying about :x and be a part of it.', ['x' => preference('company_name')]) }}
            </p>
            <div class="6xl:mt-16 mt-8">
                <div class="grid md:grid-cols-2 2xl:grid-cols-4 grid-cols-1 gap-6">

                    @foreach ( $userReviews as $key => $reviews )
                        <div class="flex flex-col gap-6">
                            @if ( $index == $key)
                                <div class="bg-white dark:bg-color-14 border border-color-DF dark:border-color-47 p-3.5 rounded-[20px] relative h-max">
                                    <div class="flex justify-between">
                                        <div class="flex flex-col justify-start">
                                            <p class="text-[38px] leading-[52px] font-RedHat font-bold text-color-14 dark:text-white">{{ $avgRating }}</p>
                                            <div>
                                                <div class="flex gap-[3px]">
                                                    @for($i=1; $i <= 5; $i++)
                                                        @if ( $avgRating >= $i )
                                                            {{-- Full star --}}
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path
                                                                        d="M7.99967 11.513L12.1197 13.9997L11.0263 9.31301L14.6663 6.15967L9.87301 5.75301L7.99967 1.33301L6.12634 5.75301L1.33301 6.15967L4.97301 9.31301L3.87967 13.9997L7.99967 11.513Z"
                                                                        fill="#FCCA19" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath>
                                                                        <rect width="16" height="16" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @elseif ( $i > $avgRating &&  $i-1 < $avgRating)
                                                            {{-- Half star --}}
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_5589_7179)">
                                                                <path d="M7.99967 11.513L12.1197 13.9997L11.0263 9.31301L14.6663 6.15967L9.87301 5.75301L7.99967 1.33301L6.12634 5.75301L1.33301 6.15967L4.97301 9.31301L3.87967 13.9997L7.99967 11.513Z" fill="#FCCA19"/>
                                                                <mask id="mask0_5589_7179"  maskUnits="userSpaceOnUse" x="1" y="1" width="14" height="13">
                                                                <path d="M7.99967 11.513L12.1197 13.9997L11.0263 9.31301L14.6663 6.15967L9.87301 5.75301L7.99967 1.33301L6.12634 5.75301L1.33301 6.15967L4.97301 9.31301L3.87967 13.9997L7.99967 11.513Z" fill="#FCCA19"/>
                                                                </mask>
                                                                <g mask="url(#mask0_5589_7179)">
                                                                <rect x="8" y="1" width="7" height="13" fill="#DFDFDF"/>
                                                                </g>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_5589_7179">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            {{-- Empty star --}}
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_5596_7286)">
                                                                <path d="M7.99967 11.513L12.1197 13.9997L11.0263 9.31301L14.6663 6.15967L9.87301 5.75301L7.99967 1.33301L6.12634 5.75301L1.33301 6.15967L4.97301 9.31301L3.87967 13.9997L7.99967 11.513Z" fill="#DFDFDF"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_5596_7286">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p class="text-color-14 dark:text-white font-Figtree font-medium text-18">{{ __('out of 5') }}</p>
                                            </div>
                                        </div>
                                        <svg class="mt-2.5 neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            viewBox="0 0 40 40" fill="none">
                                            <path
                                                d="M38.4648 15.8759H24.3492L19.9891 2.5L15.6156 15.8759L1.5 15.8625L12.9316 24.1375L8.55755 37.5L19.9891 29.2384L31.4068 37.5L27.0467 24.1375L38.4648 15.8759Z"
                                                fill="#00B67A" />
                                            <path d="M28.0279 27.1631L27.0468 24.1377L19.9893 29.2387L28.0279 27.1631Z"
                                                fill="#005128" />
                                        </svg>

                                    </div>
                                    <p class="text-color-14 dark:text-white font-Figtree font-medium text-20 mt-3">{{ __('User Rating')}}</p>
                                    <p class="font-medium text-color-89 text-14 font-Figtree mt-5">{{ __('Based on :x+ reviews', ['x' => ($ratingReport->totalRating)-1 ])}}
                                    </p>
                                </div>
                            @endif

                            @foreach($reviews as $review)
                                <div class="{{ $review['class'] }}">
                                    <div class="flex gap-1 items-center justify-end absolute top-[23px] right-[18px] review-section-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 18 19" fill="none">
                                            <g>
                                                <path
                                                    d="M9 13.4525L13.635 16.25L12.405 10.9775L16.5 7.43L11.1075 6.9725L9 2L6.8925 6.9725L1.5 7.43L5.595 10.9775L4.365 16.25L9 13.4525Z"
                                                    fill="#FCCA19" />
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="18" height="18" fill="white" transform="translate(0 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span class="font-medium text-color-14 dark:text-white text-15 font-Figtree">{{ $review['rating'] }}</span>
                                    </div>
                                    <div class="flex justify-start gap-2.5 items-start mr-12 review-section-profile">
                                        <img class="rounded-full w-[50px] h-[50px] object-fit neg-transition-scale"
                                            src="{{$review['photo']}}"
                                            alt="{{ __('Image') }}">
                                        <div>
                                            <p class="text-color-14 dark:text-white font-Figtree font-semibold text-15 mt-1.5">
                                                {{ $review['user_name'] }}
                                            </p>
                                            <p class="font-Figtree text-color-14 dark:text-white text-12 font-normal mt-1">{{ $review['designation'] }}</p>
                                        </div>
                                    </div>
                                    <p class="font-Figtree text-18 font-semibold text-color-14 dark:text-white mt-6 break-words">{{ $review['title']  }}</p>
                                    <p class="font-Figtree text-15 leading-[27px] font-normal text-color-14 dark:text-white mt-3 break-words">{{ $review['comments'] }}</p>
                                </div>
                            @endforeach

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif
