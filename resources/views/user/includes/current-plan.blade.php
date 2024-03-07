
@if (isset($activeSubscription))
    <div class="bg-color-F6 dark:bg-color-3A rounded-xl lg:p-6 p-4 w-full xl:w-full details-body 8xl:w-[71.2%]">
        <div class="flex justify-between items-center">
            <p class="text-color-14 dark:text-white text-24 font-Figtree font-semibold">
                {{ __('Current Plan') }}:
                <span class="heading-3">{{ $activePackage?->name ?? __('Unknown') }}</span>
                <span class="text-sm text-color-14 dark:text-white">({{ $activeSubscription->status }})</span>
            </p>
        </div>
        <p class="mt-2 text-color-14 dark:text-white font-Figtree font-normal text-15">
            {{ $activePackage?->short_description ?? '' }}
        </p>
        @foreach ($activeFeatureLimits as $key => $activeFeaturelimit)
            @if ($key == 'image-resolution')
                <p class="text-color-14 dark:text-white text-15 font-medium font-Figtree mt-6">
                    {{  __('Max') . ' ' . ucwords(str_replace('-', ' ', $key)) }} :
                    @if (in_array($activeSubscription->status, ['Active', 'Cancel']))
                        @if ($activeFeaturelimit['limit'] == -1)
                            {{ __('Unlimited') }}
                        @else
                            {{ $activeFeaturelimit['remain'] }}
                        @endif
                    @else
                        0
                    @endif
                </p>
            @else
                <p class="text-color-14 dark:text-white text-15 font-medium font-Figtree mt-6">
                    {{ ucwords(str_replace('-', ' ', $key)) }}
                </p>
                <div
                    class="relative h-2 w-full bg-white dark:bg-color-3A rounded-[25px] border border-color-DF dark:border-color-47 mt-3">
                    <div
                        class="progress-fill absolute h-2 rounded-[60px]" style="width: {{ $activeFeaturelimit['limit'] == -1 ? 0 : ((100 - $activeFeaturelimit['percentage']) > 100 ? 100 : 100 - $activeFeaturelimit['percentage']) }}%">
                    </div>
                </div>
                <div
                    class="flex justify-between items-center mt-3 text-12 font-Figtree text-color-14 dark:text-white font-normal">
                    <p>{{ __('Credits Used') }}:
                        @if ($activeFeaturelimit['limit'] == -1)
                            {{ is_int($activeFeaturelimit['used']) ? $activeFeaturelimit['used'] : formatDecimal($activeFeaturelimit['used']) }}/{{ in_array($activeSubscription->status, ['Active', 'Cancel']) ? __('Unlimited') : '0' }}</p>
                        @else
                            {{ is_int($activeFeaturelimit['used']) ? $activeFeaturelimit['used'] : formatDecimal($activeFeaturelimit['used']) }}/{{ in_array($activeSubscription->status, ['Active', 'Cancel']) ? $activeFeaturelimit['limit'] : '0' }}</p>
                        @endif
                    <p>{{ (100 - $activeFeaturelimit['percentage']) > 100 ? 100 : 100 - $activeFeaturelimit['percentage'] }}%</p>
                </div>
            @endif
        @endforeach
    </div>
@else
    @endif
