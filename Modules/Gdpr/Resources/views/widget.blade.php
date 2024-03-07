@if (preference('is_gdpr_enable') == '1')
    @php
        $attributes = ['gdpr_message', 'gdpr_policy_button_text', 'gdpr_confirm_button_text'];
        $gdprText = json_decode(preference('gdpr_text_' . App::getLocale()));
        $gdprTextEn = json_decode(preference('gdpr_text_en'));

        $translatedAttributes = [];
        foreach ($attributes as $attribute) {
            $translatedAttributes[$attribute] = $gdprText->$attribute ?? $gdprTextEn->$attribute;
        }
    @endphp

    <div id="cookieConsentBanner"
        class="js-cookie-consent cookie-consent bg-white dark:bg-color-14 fixed bottom-0 left-0 w-full p-4 dark:text-white text-gray-800 dark:text-white text-center z-50">
        {{ $translatedAttributes['gdpr_message'] }}
        <a href="{{ preference('gdpr_policy_link') ?? '#' }}" class="text-yellow-500 dark:text-yellow-500 underline">
            {{ $translatedAttributes['gdpr_policy_button_text'] }}
        </a>
        <button
            class="js-cookie-consent-agree cookie-consent__agree bg-color-14 dark:bg-color-76 text-white border-none py-1 px-4 text-center text-decoration-none inline-block text-sm m-2 cursor-pointer rounded-lg">
            {{ $translatedAttributes['gdpr_confirm_button_text'] }}
        </button>
    </div>


    <script>
        const COOKIE_VALUE = 1;
        const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';
        const COOKIE_LIFE_TIME = '{{ preference('gdpr_life_time') }}';
        const COOKIE_NAME = 'artifism-cookie-consent';
        const SESSION_SECURE = '{{ config('session.secure') ? ';secure' : null }}'
        const SESSION_SAME_SITE = '{{ config('session.same_site') ? ';samesite=' . config('session.same_site') : null }}'
    </script>
    <script src="{{ asset('Modules/Gdpr/Resources/assets/js/app.min.js') }}"></script>
@endif

@if (preference('is_external_gdpr_enable'))
    {!! preference('gdpr_external_script') !!}
@endif
