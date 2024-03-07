"use strict";

let timeoutHandle;

function Tabs(options) {
    var tabs = document.querySelector(options.el);
    var initCalled = false;
    var tabNavigation = tabs.querySelector(".c-tabs-nav");
    var tabNavigationLinks = tabs.querySelectorAll(".c-tabs-nav__link");
    var tabContentContainers = tabs.querySelectorAll(".c-tab");
    var marker = options.marker ? createNavMarker() : false;
    var activeIndex = 0;

    function init() {
        if (!initCalled) {
            initCalled = true;

            for (var i = 0; i < tabNavigationLinks.length; i++) {
                var link = tabNavigationLinks[i];
                clickHandlerSetup(link, i);
            }

            if (marker) {
                setMarker(tabNavigationLinks[activeIndex]);
            }
        }
    }

    function clickHandlerSetup(link, index) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            goToTab(index);
        });
    }

    function goToTab(index) {
        if (
            index >= 0 &&
            index != activeIndex &&
            index <= tabNavigationLinks.length
        ) {
            tabNavigationLinks[activeIndex].classList.remove("is-active");
            tabNavigationLinks[index].classList.add("is-active");

            tabContentContainers[activeIndex].classList.remove("is-active");
            tabContentContainers[index].classList.add("is-active");

            if (marker) {
                setMarker(tabNavigationLinks[index]);
            }

            activeIndex = index;
        }
    }

    function createNavMarker() {
        var marker = document.createElement("div");
        marker.classList.add("c-tab-nav-marker");
        tabNavigation.appendChild(marker);
        return marker;
    }

    function setMarker(element) {
        marker.style.left = element.offsetLeft + "px";
        marker.style.width = element.offsetWidth + "px";
    }

    return {
        init: init,
        goToTab: goToTab,
    };
}

const iniTabs = () => {
    document.querySelectorAll(".p_tabs").forEach((tab) => {
        var m = new Tabs({
            el: "#" + tab.id,
            marker: true,
        });

        m.init();
    });
};

iniTabs();

/**
 * Ajax product load
 */

var ajaxLoadedArray = [];

$.fn.isInViewport = function () {
    if (this.length == 0) {
        return false;
    }
    return this[0].getBoundingClientRect().top < $(window).height();
};

function startInitialLoad() {
    if ($(".has-ajax-load-data").length == 0) {
        return;
    }
    $(".has-ajax-load-data").each(function() {
        let button = this;

        let cid = $(button).data("component");

        if (ajaxLoadedArray.includes(cid)) {
            return;
        }

        ajaxLoadedArray.push(cid);

        $.ajax(ajaxLoadUrl + `?component=${cid}`, {
            type: "GET", // http method
            dataType: "json",
            data: {},
            success: function (data, status, xhr) {
                ajaxProductLoaded(button, data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });
    })
}

function ajaxProductLoaded(dom, data) {
    $(dom).parent().html(data.response.records.html);
}

startInitialLoad();

