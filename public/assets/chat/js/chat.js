"use strict";

    var toastMixin = Swal.mixin({
        toast: true,
        icon: "error",
        title: "General Title",
        animation: false,
        position: "top",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    /**
     * Toggles chat container
     */
    $(document).on("click", ".chat-toggle-button", function () {
        if($('div').hasClass("chat-sidebar-user")) {
            var ID = $('.chat-sidebar-user').first().attr('id');
            fetchData(ID)
        }

        $(this).toggleClass("chat-hidden");
        $(".chat-view-container").toggleClass("chat-hidden");
    });

    /**
     * CLoses chat container
     */
    $(document).on("click", ".chat-view-close-button", function () {
        $("#message-to-send").trigger("focus");
        $(".chat-toggle-button").trigger("click");
    });

    $(document).on("click", ".dashboard-chat", function () {
        $(".chat-toggle-button").trigger("click");
    });



    $('#message-to-send').on("keyup", function (e) {
        if (e.keyCode === 13 && !e.shiftKey) {
            $('.chat-inbox-send-button').trigger('click');
        }
    });

    $(document).on('click', '.new-chat', function(){
        let assistantImage = $('.active-assistant').attr('data-image');
        let assistantMessage = $('.active-assistant').attr('data-message');
        $('.chat-inbox-message-list').html(`
        <li class="chat-inbox-single-item chat-inbox-received">
            <div class="chat-inbox-single-avatar">
                <img src="${assistantImage}" alt="chat-robot">
            </div>
            <div>
            <div class="chat-inbox-single-content">
                <code class="font-Figtree whitespace-pre-wrap">${filterXSS(assistantMessage)}</code>
            </div>
            </div>
        </li>`
        );
        $('#messageId').val('')
        $("#message-to-send").trigger("focus");
    });

    function fetchData(id)
    {
        $.ajax({
            url: SITE_URL + '/' + 'user/chat-history/' + id,
            type: "get",
            beforeSend: function (xhr) {
                $('.chat-inbox-message-list').html('');
                $('.chat-inbox-loader-overlay').show();
                $(".chat-sidebar-user").removeClass("chat-user-active");
                $('.list-'+ id).addClass('chat-user-active');
            },
            data: {
                id: id,
            },
            success: function(response) {
                if (response.error) {
                    errorMessage(response.error.message);
                    return true;
                }
                appendData(response, id);
            },

            error: function(response) {
                var jsonData = JSON.parse(response.responseText);
                errorMessage(jsonData.response.status.message, 'code-creation');
             }
        });
    }

    function appendData(response, id) {
        let html = '';
        let userImage = $('#user-img').attr('data-url');
        let assistantImage = $('.active-assistant').attr('data-image');
        let assistantMessage = $('.active-assistant').attr('data-message');

        var totalItem = response.length;
        html += `<li class="chat-inbox-single-item chat-inbox-received">
                    <div class="chat-inbox-single-avatar">
                        <img src="${assistantImage}" alt="chat-robot">
                    </div>
                    <div>
                    <div class="chat-inbox-single-content">
                        <code class="font-Figtree whitespace-pre-wrap">${filterXSS(assistantMessage)}</code>
                    </div>
                    </div>
                </li>`;
        for(var i = 0; i < totalItem; i++) {
            if (i % 2 != 0) {

            html += `<li class="chat-inbox-single-item chat-inbox-received">
                    <div class="chat-inbox-single-avatar">
                        <img src="${assistantImage}" alt="chat-robot">
                    </div>
                    <div>
                    <div class="chat-inbox-single-content">
                        <code class="font-Figtree whitespace-pre-wrap">${filterXSS(response[i].bot_message)}</code>
                    </div>
                    </div>
                </li>`;
            }
            else {
                html += `<li class="chat-inbox-single-item chat-inbox-sent ">
                <div class="chat-inbox-single-avatar">
                    <img src="${userImage}" alt="Rectangle-robot">
                </div>
                <div>
                    <div class="chat-inbox-single-content font-Figtree wrap-anywhere">
                        ${filterXSS(response[i].user_message)}
                    </div>
                </div>
            </li>`;
            }

        }

        $('#messageId').val(id)
        $('.chat-inbox-loader-overlay').hide();
        $('.chat-inbox-message-list').html(html);
        $(".chat-inbox-body").scrollTop($(".chat-inbox-body").prop("scrollHeight"));
    }

    $(document).on("click", ".chat-sidebar-user", function(e) {
        if ($(e.target).hasClass('chat-sidebar-user') || $(e.target).hasClass('editable-title')) {
            fetchData(this.id)
        }

    });

     /**
     * Submit the message form when the send button is clicked
     */
    $(document).on("click", ".chat-inbox-send-button", function (e) {
        var isExecuted = 0;
        let ask = filterXSS($('#message-to-send').val());
        if(ask.trim() === '') {
            return false;
        }

        
        const userImage = $('#user_image').attr('data-image');
        let div = $(".chat-inbox-body");
        let chatId = $('#messageId').val();
        let parentConversation = $('.chat-sidebar-users');
        let conversation = $('.list-' + chatId);
        let parentAssistant = $('.message-content');
        let assistant = $('.active-assistant');
        let botId = $('#botId').val();
        let botImage = $('.active-assistant').attr("data-image");
        let question = `<li class="chat-inbox-single-item chat-inbox-sent ">
                    <div class="chat-inbox-single-avatar">
                        <img src="${userImage}" alt="Rectangle-robot">
                    </div>
                    <div>
                        <div class="chat-inbox-single-content font-Figtree wrap-anywhere">
                            ${filterXSS($('#message-to-send').val())}
                        </div>
                    </div>
                </li>`;
        e.preventDefault();
        $('#message-to-send').val(''),
      

        $('.chat-inbox-message-list').append(question);
        $('.chat-bubble').show();
        div.scrollTop(div.prop("scrollHeight"));
        $(parentAssistant).prepend(assistant);
        $(parentConversation).prepend(conversation);
        var gethtml = '';

        fetch(SITE_URL + '/' + 'api/V1/user/openai/chat', {
            method: 'POST',
            body: JSON.stringify({
                promt: ask,
                chatId: chatId,
                botId: botId,
                dataType: 'json',
                _token: CSRF_TOKEN
            }),
            headers: {
                'Content-type': 'application/json',
                'stream-data': true,
                Authorization: `Bearer ${ACCESS_TOKEN}`
            },
        }) .then(async (res) => {
            let isAppend = true;
            if (!res.ok) {
                   // Log the error
            }
            const reader = res.body.getReader();
            const decoder = new TextDecoder();
            var conversationId = '';

            let text = "";
            while (true) {
                const { value, done } = await reader.read();
                if (done) break;
                text = decoder.decode(value, { stream: true });
                var numericValues = text.match(/__chatId\s*:\s*(\d+)$/);

                if (numericValues !== null) {
                    conversationId = numericValues[1] == '0' ? '' : numericValues[1];
                }
                
                text = text.replace(/__chatId\s*:\s*(\d+)$/, '');
                function isJSONString(str) {
                    if (isExecuted == 0) {
                        try {
                            JSON.parse(str);
                            return true;
                        } catch (error) {
                            isExecuted = 1;
                            return false;
                        }
                    }
                    return false;
                }
                if (isJSONString(text)) {
                    var stringData = JSON.parse(text)
                    if (stringData.text) {
                        var message = stringData.text;
                        errorMessage(message, 'code-creation');
                        $('.chat-bubble').hide();
                        return;
                    }
                    var message = stringData.response.records.response ? stringData.response.records.response : stringData.text;
                    errorMessage(message, 'code-creation');
                        $('.chat-bubble').hide();
                        return;

                } else {
                    gethtml += filterXSS(text);
                    if (isAppend == true) {
                        isAppend = false;
                        let answer = `<li class="chat-inbox-single-item chat-inbox-received">
                                        <div class="chat-inbox-single-avatar">
                                            <img src="${botImage}" alt="chat-robot">
                                        </div>
                                        <div>
                                            <div class="chat-inbox-single-content">
                                                <code class="font-Figtree whitespace-pre-wrap chat-data">${gethtml}</code>
                                            </div>
                                        </div>
                                    </li>`;
                        $('.chat-bubble').hide();
                        $('.chat-inbox-message-list').append(answer);
                        
                    } else {
                        $('.chat-data:last').text(gethtml);
                    }
                }

                // Get the last word
                if (conversationId.length !== 0 && chatId.length == 0) {
                    $('#messageId').val(conversationId);
                    $(".chat-sidebar-user").removeClass("chat-user-active");
                    parentConversation.prepend(addConversation(conversationId, ask));
                    $('#'+ conversationId).addClass('chat-user-active')
                }
            }

            div.scrollTop(div.prop("scrollHeight"));
        }).catch(error => {
                // Log the error
        });

    });
    

    $(document).on("click", ".chat-modal", function (e) {
        $('.delete-chat').attr('data-id', this.id); // sets
        e.preventDefault();
        $('.modal-parent').toggleClass('is-visible');
    });

    $(document).on('click', '.delete-chat', function () {
        var chatId = $(this).attr("data-id");
        doAjaxprocess(
            SITE_URL + "/user/delete-chat",
            {
                chatId : chatId,
                _token: CSRF_TOKEN
            },
            'post',
            'json'
        ).done(function(data) {
            $('.list-' + chatId).remove();
            toastMixin.fire({
                title: data.message,
                icon: data.status,
            });
            var ID = $('.chat-sidebar-user').first().attr('id');
            $('.modal-parent').toggleClass('is-visible');
            fetchData(ID)
        });
    });

    $(function() {
        $(document).on('click', '.edit-icon', function () {
            var editId = this.id
            var $titleContainer = $(this).closest('.title-container');
            var $title = $titleContainer.find('.editable-title');
            var currentValue = $title.text().trim();

            var $input = $('<input>', {
                type: 'text',
                value: currentValue
            });

            $title.replaceWith($input);
            $input.focus();

            $input.on('blur', function() {
                var newValue = $input.val();

                $input.replaceWith($('<p>', {
                class: 'editable-title',
                text: newValue
                }));

                doAjaxprocess(
                    SITE_URL + "/user/update-chat",
                    {
                        chatId : editId,
                        name : newValue,
                        _token: CSRF_TOKEN
                    },
                    'post',
                    'json'
                ).done(function(data) {

                });
            });
        });
    });

    var pageNumber = $('.chat-sidebar-users').data('next-page-url') ? $('.chat-sidebar-users').data('next-page-url').split("?page=")[1] : 0;
    var checked = true;

    $('.chat-view-sidebar').on('scroll', function(){
        checkIfAtEnd(this)
    });

    function checkIfAtEnd(contentContainer) {
        
        const contentHeight = contentContainer.scrollHeight;
        const visibleHeight = contentContainer.clientHeight;
        const scrollPosition = contentContainer.scrollTop;
        
        if ((scrollPosition + visibleHeight >= contentHeight) && pageNumber != 0 && pageNumber.length != 0 && checked) {
            checked = false;
            const parentDiv = $('.chat-sidebar-users');
            var assistantId = $('.active-assistant').attr('id');

            doAjaxprocess(
                SITE_URL + '/' + 'user/chat-conversation?page=' + pageNumber,
                {
                    id: assistantId,
                },
                'get',
                'json'
            ).done(function(response) {
                var sidebarHTML = response.html.data.map(function(item) {
                    return addConversation(item.chat_conversation_id, item.title);
                }).join('');
                parentDiv.append(sidebarHTML);
                parentDiv.removeAttr('data-next-page-url');
                pageNumber = response.html.next_page_url ? response.html.next_page_url.split("?page=")[1] : [];
                checked = true;
            });
        }
    }

    function addConversation(conversationId, ask){
        return `
            <div class="chat-sidebar-user border bg-[#3A3A39] border-[#474746] rounded chat-list list-${conversationId}" id="${conversationId}">
                <div>
                    <div class="flex justify-between items-center relative title-container">
                        <p class="editable-title text-white text-[13px]">${filterXSS(ask)}</p>
                        <div class="flex gap-2">
                            <a class="text-white justify-center chat-modal hidden" href="javascript:void(0)" id="${conversationId}">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58613 2.52592C10.2566 1.82469 11.3435 1.82469 12.0139 2.52592C12.6844 3.22715 12.6844 4.36406 12.0139 5.06529L5.10446 12.2923C5.09357 12.3037 5.08278 12.315 5.07208 12.3262C4.91398 12.4919 4.77459 12.6379 4.60655 12.7456C4.45892 12.8403 4.29797 12.91 4.12961 12.9523C3.93797 13.0004 3.74066 13.0002 3.51687 13C3.50172 13 3.48645 12.9999 3.47105 12.9999H2.55005C2.2463 12.9999 2.00006 12.7424 2.00006 12.4247V11.4614C2.00006 11.4453 2.00004 11.4293 2.00003 11.4134C1.99982 11.1794 1.99964 10.973 2.04565 10.7725C2.08606 10.5964 2.15273 10.4281 2.2432 10.2737C2.34618 10.0979 2.48583 9.95213 2.64422 9.78677C2.65494 9.77558 2.66575 9.76429 2.67664 9.7529L9.58613 2.52592ZM11.2361 3.33948C10.9953 3.08756 10.6048 3.08756 10.3639 3.33948L3.45445 10.5665C3.24569 10.7848 3.2072 10.8303 3.1811 10.8748C3.15094 10.9263 3.12872 10.9824 3.11525 11.0411C3.10359 11.0919 3.10005 11.1526 3.10005 11.4614V11.8494H3.47105C3.76628 11.8494 3.82425 11.8457 3.87282 11.8335C3.92894 11.8194 3.98259 11.7962 4.0318 11.7646C4.0744 11.7373 4.11789 11.6971 4.32665 11.4787L11.2361 4.25173C11.477 3.99982 11.477 3.59139 11.2361 3.33948ZM6.95002 12.4247C6.95002 12.107 7.19627 11.8494 7.50002 11.8494H12.45C12.7538 11.8494 13 12.107 13 12.4247C13 12.7424 12.7538 12.9999 12.45 12.9999H7.50002C7.19627 12.9999 6.95002 12.7424 6.95002 12.4247Z" fill="white"></path>
                                </svg>
                            </a>
                            <a class="edit-icon text-white justify-center w-4 hidden" href="javascript:void(0)">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6665 1.75033C4.6665 1.42816 4.92767 1.16699 5.24984 1.16699H8.74984C9.072 1.16699 9.33317 1.42816 9.33317 1.75033C9.33317 2.07249 9.072 2.33366 8.74984 2.33366H5.24984C4.92767 2.33366 4.6665 2.07249 4.6665 1.75033ZM2.91198 2.91699H1.74984C1.42767 2.91699 1.1665 3.17816 1.1665 3.50033C1.1665 3.82249 1.42767 4.08366 1.74984 4.08366H2.37076L2.74509 9.6985C2.77446 10.1392 2.79876 10.5038 2.84235 10.8007C2.88772 11.1097 2.9597 11.3921 3.10964 11.6553C3.34306 12.0651 3.69513 12.3944 4.11947 12.6001C4.39206 12.7322 4.67864 12.7852 4.99002 12.8099C5.28909 12.8337 5.65457 12.8337 6.09622 12.8337H7.90346C8.34511 12.8337 8.71059 12.8337 9.00966 12.8099C9.32104 12.7852 9.60762 12.7322 9.8802 12.6001C10.3045 12.3944 10.6566 12.0651 10.89 11.6553C11.04 11.3921 11.112 11.1097 11.1573 10.8007C11.2009 10.5038 11.2252 10.1391 11.2546 9.69842L11.6289 4.08366H12.2498C12.572 4.08366 12.8332 3.82249 12.8332 3.50033C12.8332 3.17816 12.572 2.91699 12.2498 2.91699H11.0877C11.0843 2.91696 11.0809 2.91696 11.0775 2.91699H2.92219C2.91879 2.91696 2.91539 2.91696 2.91198 2.91699ZM10.4597 4.08366H3.54002L3.90763 9.59778C3.93894 10.0674 3.96058 10.3856 3.99664 10.6312C4.03166 10.8697 4.07445 10.992 4.12335 11.0778C4.24006 11.2827 4.41609 11.4474 4.62826 11.5502C4.71716 11.5933 4.842 11.6278 5.08234 11.6469C5.32977 11.6666 5.64875 11.667 6.11939 11.667H7.88029C8.35092 11.667 8.66991 11.6666 8.91734 11.6469C9.15767 11.6278 9.28251 11.5933 9.37141 11.5502C9.58358 11.4474 9.75962 11.2827 9.87633 11.0778C9.92523 10.992 9.96802 10.8697 10.003 10.6312C10.0391 10.3856 10.0607 10.0674 10.092 9.59778L10.4597 4.08366ZM5.83317 5.54199C6.15534 5.54199 6.4165 5.80316 6.4165 6.12533V9.04199C6.4165 9.36416 6.15534 9.62533 5.83317 9.62533C5.511 9.62533 5.24984 9.36416 5.24984 9.04199V6.12533C5.24984 5.80316 5.511 5.54199 5.83317 5.54199ZM8.1665 5.54199C8.48867 5.54199 8.74984 5.80316 8.74984 6.12533V9.04199C8.74984 9.36416 8.48867 9.62533 8.1665 9.62533C7.84434 9.62533 7.58317 9.36416 7.58317 9.04199V6.12533C7.58317 5.80316 7.84434 5.54199 8.1665 5.54199Z" fill="white"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

/**
 * @param mixed url, which url hit this call
 * @param mixed params, paramters
 * @param mixed type, get, post
 * @param mixed dataType, json, html
 *
 * @return [type]
 */
function doAjaxprocess(url, params, type, dataType) {
    return $.ajax({
        data: params,
        url: url,
        type: type,
        dataType: dataType,
    });
}

function errorMessage(message, btnId) {
    toastMixin.fire({
        title: message,
        icon: 'error'
    });
    $(".loader").addClass('hidden');
    $('#'+ btnId).removeAttr('disabled');
}

$(document).ready(function() {
    dropDown();
    $(".plan-not-active").appendTo(".assistant-content");
});

function dropDown() {
    $('.collapse-button').on('click',function() {
        $('.chat-sidebar').toggleClass('sidebar_small');
        $('.chat-content').toggleClass('main-content_large');
        $('.full-content-icon').toggleClass('hidden');
        $('.half-content-icon').toggleClass('hidden');
        $('.new-chat').toggleClass('opacity-0');
        
    });

    $('.chat-dropdown').on("click", function(event){
        event.stopPropagation();
        $(".chat-dropdown-content").slideToggle(200);
    });

    $('.search-input').on("click", function(event){
        event.stopPropagation();  // Prevents the click from reaching the document handler
    });
    $('.chat-dropdown-content').on("click", function(event){
        event.stopPropagation();  // Prevents the click from reaching the document handler
    });
    $(document).on("click", function () {
        $(".chat-dropdown-content").hide();
    });
}

$(".chat-search-input").on("keyup", function() {
    var value = this.value.toLowerCase().trim();
    $(".user-name").each(function() {
      var $parentDiv = $(this).closest('.search-content');
      $parentDiv.toggle($(this).text().toLowerCase().trim().includes(value));
    });
  });

function fetchChatBot(e) {
    const ChatBotId = e.id;
    $.ajax({
        url: SITE_URL + '/' + 'user/chat/bot',
        type: "get",
        beforeSend: function (xhr) {
            $(".chat-view-container").removeClass('chat-hidden');
            $(".message-content").addClass("opacity-1");

            const html = `
                <div class="loader-template items-center h-[20vh]">
                    <svg class="animate-spin h-7 w-7 m-auto mt-[100px]" xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                        <mask id="path-1-inside-1_1032_3036" fill="white">
                        <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                        </mask>
                        <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" stroke="url(#paint0_linear_1032_3036)" stroke-width="24" mask="url(#path-1-inside-1_1032_3036)" />
                        <defs>
                        <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195" y2="6.73779" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#E60C84" />
                            <stop offset="1" stop-color="#FFCF4B" />
                        </linearGradient>
                        </defs>
                    </svg>
                </div> `;
            $('.message-content').html(html);
        },
        data: {
            id: ChatBotId,
        },
        success: function(response) {
            
            $(".chat-view-container").html(response.html);
            $(".chat-toggle-button").addClass('chat-hidden');
            if (response.chat.length != 0 ) {
                $('.list-'+ response.id).addClass('chat-user-active');
                appendData(response.chat, response.id);
                
            }
            dropDown();

            $('.search-input').on("click", function(event){
                event.stopPropagation();  // Prevents the click from reaching the document handler
            });

            $(".chat-search-input").on("keyup", function() {
                var value = this.value.toLowerCase().trim();
                $(".user-name").each(function() {
                  var $parentDiv = $(this).closest('.search-content');
                  $parentDiv.toggle($(this).text().toLowerCase().trim().includes(value));
                });
            });
        },
        complete: function() {
            $(".plan-not-active").appendTo(".assistant-content");
        },
        error: function(response) {
            var jsonData = JSON.parse(response.responseText);
            errorMessage(jsonData.response.status.message, 'code-creation');
         }
    });
}
  
  
  