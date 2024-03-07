@if(auth()->check())
    @php
        $user = auth()->user()->affiliateUser()->first();
    @endphp
    @if(empty($user) || !empty($user) && $user->status == 'Pending')
        <li class="px-3 py-1 rounded-md" data-url ="">
            <a class=" text-16 font-normal font-Figtree" href="{{ route('site.affiliate.registration') }}">{{ __('Be an Affiliate user') }}</a>
        </li>
    @endif
@endif
