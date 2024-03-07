"use strict";

window.laravelCookieConsent = (function () {

    function consentWithCookies() {
        setCookie(COOKIE_NAME, COOKIE_VALUE, COOKIE_LIFE_TIME);
        hideCookieDialog();
    }

    function cookieExists(name) {
        return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
    }

    function hideCookieDialog() {
        const dialogs = document.getElementsByClassName('js-cookie-consent');

        for (let i = 0; i < dialogs.length; ++i) {
            dialogs[i].style.display = 'none';
        }
    }

    function setCookie(name, value, expirationInDays) {
        const date = new Date();
        date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value
            + ';expires=' + date.toUTCString()
            + ';domain=' + COOKIE_DOMAIN
            + ';path=/' + SESSION_SECURE
            + SESSION_SAME_SITE;
    }

    if (cookieExists(COOKIE_NAME)) {
        hideCookieDialog();
    }

    const buttons = document.getElementsByClassName('js-cookie-consent-agree');

    for (let i = 0; i < buttons.length; ++i) {
        buttons[i].addEventListener('click', consentWithCookies);
    }

    return {
        consentWithCookies: consentWithCookies,
        hideCookieDialog: hideCookieDialog
    };
})();