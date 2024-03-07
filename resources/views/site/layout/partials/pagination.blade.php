@if ($paginator->hasPages())
<div class="mt-6 flex sm:flex-nowrap gap-6 flex-wrap sm:justify-between justify-center items-center">
    <p class="font-Figtree text-medium text-14 text-color-89"> {!! __('Showing :x out of :y', ['x' => "<span class='text-color-14 dark:text-white ml-1'>" . (($paginator->currentPage() - 1) * $paginator->perPage() + 1) .'-'. (($paginator->currentPage()-1)*$paginator->perPage()+1) + ($paginator->count()-1) . "</span>", 'y' => "<span class='text-color-14 dark:text-white ml-1'>" . $paginator->total() . "</span>"]) !!}</p>
    <div class="flex justify-end items-center gap-[13px]">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#"
                class="flex disabled items-center gap-1 font-Figtree font-medium text-14 text-color-DF dark:text-color-47">
                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                fill="none">
                <g clip-path="url(#clip0_2081_1551)">
                    <path
                        d="M9.625 3.75594L6.38006 7.4375L9.625 11.1191L8.62601 12.25L4.375 7.4375L8.62601 2.625L9.625 3.75594Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_2081_1551">
                        <rect width="14" height="14" fill="white"
                            transform="matrix(-1 0 0 -1 14 14)" />
                    </clipPath>
                </defs>
            </svg>{{ __('Prev') }}
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center gap-1 font-Figtree font-medium text-14 text-color-89">
                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                fill="none">
                <g clip-path="url(#clip0_2081_1551)">
                    <path
                        d="M9.625 3.75594L6.38006 7.4375L9.625 11.1191L8.62601 12.25L4.375 7.4375L8.62601 2.625L9.625 3.75594Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_2081_1551">
                        <rect width="14" height="14" fill="white"
                            transform="matrix(-1 0 0 -1 14 14)" />
                    </clipPath>
                </defs>
                </svg>
               {{ __('Prev') }}
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span
                    class="px-2 h-8 w-8 text-center py-1 rounded-sm text-gray-10 text-15 roboto-medium font-medium">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#"
                            class="bg-color-14 rounded-md py-[5px] px-[13px] text-white font-Figtree font-medium text-14">
                            {{ $page }}
                        </a>
                    @else
                        <a href="{{ $url }}"
                            class="hover:bg-color-14 rounded-md py-[5px] dark:text-color-89 px-[13px] hover:!text-white text-color-14 font-Figtree font-medium text-14">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center gap-1 font-Figtree font-medium text-14 text-color-89">
              {{ __('Next') }}
              <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
              fill="none">
              <g clip-path="url(#clip0_2081_1548)">
                  <path
                      d="M4.375 3.75594L7.61994 7.4375L4.375 11.1191L5.37399 12.25L9.625 7.4375L5.37399 2.625L4.375 3.75594Z"
                      fill="currentColor" />
              </g>
              <defs>
                  <clipPath id="clip0_2081_1548">
                      <rect width="14" height="14" fill="white"
                          transform="matrix(1 0 0 -1 0 14)" />
                  </clipPath>
              </defs>
          </svg>
            </a>
        @else
            <a href="javascript:void(0)" class="flex disabled items-center gap-1 font-Figtree font-medium text-14 text-color-DF dark:text-color-47">
                {{ __('Next') }}
                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                fill="none">
                <g clip-path="url(#clip0_2081_1548)">
                    <path
                        d="M4.375 3.75594L7.61994 7.4375L4.375 11.1191L5.37399 12.25L9.625 7.4375L5.37399 2.625L4.375 3.75594Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_2081_1548">
                        <rect width="14" height="14" fill="white"
                            transform="matrix(1 0 0 -1 0 14)" />
                    </clipPath>
                </defs>
            </svg>
            </a>
        @endif
    </div>
</div>
@endif