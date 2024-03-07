"use strict";

function updateThemePreferenceDB(mode) {
    $.ajax({
        url: SWITCH_THEME_URL,
        type: 'POST',
        dataType: "json",
        data: {
            _token: CSRF_TOKEN,
            theme: mode
        },
        success: function (response) { },
        error: function (xhr, status, error) { }
    });
}

function switchThemePreference() {
    let element = document.getElementById('switch');

    if (element) {
        element.addEventListener('click', (e) => {
            let mode = null;
            let htmlElement = document.documentElement;
    
            if (htmlElement.classList.contains('dark')) {
                mode = 'light';
                htmlElement.classList.remove(...htmlElement.classList);
                htmlElement.classList.add(mode);
            } else {
                mode = 'dark';
                htmlElement.classList.remove(...htmlElement.classList);
                htmlElement.classList.add(mode);
            }
    
            updateThemePreferenceDB(mode);
        });
    } else {
        let theme = themePreference ? themePreference : 'light';
        let htmlElement = document.documentElement;
        htmlElement.classList.remove('dark', 'light');
        htmlElement.classList.add(theme);
    }

}

$(document).ready(function() {
    $(document).on('click', '.sun', function() {
        $(".sun").addClass("hidden");
        $(".moon").removeClass("hidden");
    });

    $(document).on('click', '.moon', function() {
        $(".moon").addClass("hidden");
        $(".sun").removeClass("hidden");
    });
});

function activeMenuBar() {
    var url = window.location.href;
    let lists = document.querySelectorAll("#header > li");

    lists.forEach( function (list) {
        if (url === $(list).attr('data-url') || (window.location.toString().includes('blog') && String($(list).attr('data-url')).includes('blog')) ) {
            $(list).addClass('bg-[#E22861]');
        }
    });
}

$(document).on('click', '#header>li', function(e) {

    var url = $(this).attr("data-url");
    
    if (url.includes('/#') && (window.location.href == url.split('#')[0])) {
        $(this).addClass('bg-[#E22861]');
    }

});

$(document).on('click', '.plan-loader', function(e) {
    var html =`
    <div class="loader-template items-center">
        <svg class="animate-spin h-7 w-7 m-auto" xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
            <mask id="path-1-inside-1" fill="white">
                <path
                d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
            </mask>
            <path
                d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                stroke="url(#paint0_linear_1032)" stroke-width="24"
                mask="url(#path-1-inside-1)" />
            <defs>
                <linearGradient id="paint0_linear_1032" x1="46.8123" y1="63.1382" x2="21.8195"
                    y2="6.73779" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84" />
                    <stop offset="1" stop-color="#FFCF4B" />
                </linearGradient>
            </defs>
        </svg>
    </div>`;
    var loader = $(this).append(html);

    setTimeout(function() {
      $('.loader-template').remove();
      loader.removeAttr('disabled');
    }, 6000);

  });

$(() => {
    switchThemePreference();
    activeMenuBar();
});
