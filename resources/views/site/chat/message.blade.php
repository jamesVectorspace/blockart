
<div>
    <div class="chat-view-header items-center">
        <div class="chat-view-header-text justify-between ltr:mr-5 rtl:ml-5 lg:gap-[230px] gap-10">
            <div class="flex justify-start items-center gap-3">
                @if(Auth()->user())
                <div class="chat-sidebar-user-img">
                    <img class="chat-sidebar-img object-cover" src="{{ $bot->fileUrl() }}">
                </div>
                @else
                <div class="chat-message-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 19" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.94606 4.0182e-07H10.0539C11.4126 -1.49762e-05 12.5083 -2.74926e-05 13.3874 0.0894005C14.2948 0.181709 15.0817 0.377504 15.7779 0.842653C16.3238 1.20745 16.7926 1.6762 17.1573 2.22215C17.6225 2.91829 17.8183 3.70523 17.9106 4.61264C18 5.49173 18 6.58738 18 7.94604V8.05396C18 9.41262 18 10.5083 17.9106 11.3874C17.8183 12.2948 17.6225 13.0817 17.1573 13.7778C16.7926 14.3238 16.3238 14.7926 15.7778 15.1573C15.1699 15.5636 14.4931 15.7642 13.7267 15.8701C13.1247 15.9534 12.4279 15.9827 11.6213 15.9935L10.7889 17.6584C10.0518 19.1325 7.94819 19.1325 7.21115 17.6584L6.37872 15.9935C5.57211 15.9827 4.87525 15.9534 4.2733 15.8701C3.50685 15.7642 2.83014 15.5636 2.22215 15.1573C1.6762 14.7926 1.20745 14.3238 0.842653 13.7778C0.377504 13.0817 0.181709 12.2948 0.0894005 11.3874C-2.74926e-05 10.5083 -1.49762e-05 9.41261 4.0182e-07 8.05394V7.94606C-1.49762e-05 6.58739 -2.74926e-05 5.49174 0.0894005 4.61264C0.181709 3.70523 0.377504 2.91829 0.842653 2.22215C1.20745 1.6762 1.6762 1.20745 2.22215 0.842653C2.91829 0.377504 3.70523 0.181709 4.61264 0.0894005C5.49174 -2.74926e-05 6.58739 -1.49762e-05 7.94606 4.0182e-07ZM4.81505 2.07913C4.06578 2.15535 3.64604 2.29662 3.33329 2.50559C3.00572 2.72447 2.72447 3.00572 2.50559 3.33329C2.29662 3.64604 2.15535 4.06578 2.07913 4.81505C2.00121 5.58104 2 6.57472 2 8C2 9.42527 2.00121 10.419 2.07913 11.1849C2.15535 11.9342 2.29662 12.354 2.50559 12.6667C2.72447 12.9943 3.00572 13.2755 3.33329 13.4944C3.60665 13.6771 3.96223 13.8081 4.54716 13.889C5.14815 13.9721 5.92075 13.9939 7.00436 13.9986C7.40885 14.0004 7.75638 14.2421 7.91233 14.5886L9 16.7639L10.0877 14.5886C10.2436 14.2421 10.5912 14.0004 10.9956 13.9986C12.0792 13.9939 12.8518 13.9721 13.4528 13.889C14.0378 13.8081 14.3933 13.6771 14.6667 13.4944C14.9943 13.2755 15.2755 12.9943 15.4944 12.6667C15.7034 12.354 15.8446 11.9342 15.9209 11.1849C15.9988 10.419 16 9.42527 16 8C16 6.57472 15.9988 5.58104 15.9209 4.81505C15.8446 4.06578 15.7034 3.64604 15.4944 3.33329C15.2755 3.00572 14.9943 2.72447 14.6667 2.50559C14.354 2.29662 13.9342 2.15535 13.1849 2.07913C12.419 2.00121 11.4253 2 10 2H8C6.57473 2 5.58104 2.00121 4.81505 2.07913Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 6C5 5.44772 5.44772 5 6 5L12 5C12.5523 5 13 5.44772 13 6C13 6.55228 12.5523 7 12 7L6 7C5.44772 7 5 6.55228 5 6Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 10C5 9.44772 5.44772 9 6 9H9C9.55228 9 10 9.44772 10 10C10 10.5523 9.55228 11 9 11H6C5.44772 11 5 10.5523 5 10Z" fill="currentColor"></path>
                    </svg>
                </div>
                @endif
                
                <div class="flex items-center gap-2 relative">
                    <span class="text-left font-bold font-RedHat text-base line-clamp-single wrap-anywhere text-white {{ Auth()->user()? '':'' }}"> {{ Auth()->user() ? $bot->name : __('Messages') }} </span>
                    @if(Auth()->user())
                        <div class="w-[121px]">
                            <a class="chat-dropdown flex flex-col items-center cursor-pointer">
                                <div class="text-white flex justify-center items-center gap-1.5 chat-dropdown">
                                <p class="text-color-DF text-[11px] font-Figtree font-medium leading-4">{{ __('Change Character') }}</p>
                                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.79445 4.89225C2.81739 4.92556 2.84808 4.9528 2.88388 4.97161C2.91968 4.99043 2.95951 5.00026 2.99995 5.00026C3.0404 5.00026 3.08023 4.99043 3.11603 4.97161C3.15183 4.9528 3.18252 4.92556 3.20545 4.89225L5.45545 1.64225C5.4815 1.60476 5.49677 1.56086 5.49961 1.5153C5.50245 1.46975 5.49276 1.42428 5.47158 1.38385C5.45039 1.34342 5.41853 1.30956 5.37946 1.28596C5.34039 1.26237 5.2956 1.24993 5.24995 1.25H0.749954C0.704415 1.25019 0.659788 1.26279 0.620874 1.28644C0.581959 1.3101 0.550229 1.34391 0.529096 1.38425C0.507962 1.42459 0.498225 1.46992 0.500931 1.51538C0.503637 1.56084 0.518684 1.6047 0.544454 1.64225L2.79445 4.89225Z" fill="#DFDFDF"/>
                                </svg>
                            </div>
                            </a>
                            <div
                                class="hidden origin-top-right sm:w-[372px] xs:w-[284px] w-[250px] absolute mx-auto border border-color-89 dark:border-color-47 rounded-lg bg-white dark:bg-color-3A z-50 chat-dropdown-content pt-3 pb-2 ltr:left-0 rtl:right-0 top-8">
                                <div>
                                    <p class="text-color-14 text-lg font-semibold font-RedHat leading-6 text-left wrap-anywhere px-4 dark:text-white">{{ ('AI Characters') }}</p>
                                    <div class="flex justify-end mt-2 px-4 search-input">
                                        <button class="search-btn -mr-10 py-1.5 ltr:pr-2 ltr:pl-3 rtl:pl-2 rtl:pr-3">
                                            <svg class="text-color-14 dark:text-white" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_8755_6953)">
                                                <path d="M16.9211 15.9523L12.8934 11.7633C13.929 10.5322 14.4964 8.98328 14.4964 7.37077C14.4964 3.60329 11.4312 0.538086 7.66374 0.538086C3.89626 0.538086 0.831055 3.60329 0.831055 7.37077C0.831055 11.1383 3.89626 14.2035 7.66374 14.2035C9.0781 14.2035 10.4259 13.7769 11.5783 12.967L15.6366 17.1879C15.8062 17.364 16.0344 17.4612 16.2789 17.4612C16.5103 17.4612 16.7298 17.3729 16.8965 17.2125C17.2506 16.8718 17.2619 16.3067 16.9211 15.9523ZM7.66374 2.32053C10.4485 2.32053 12.714 4.58601 12.714 7.37077C12.714 10.1555 10.4485 12.421 7.66374 12.421C4.87897 12.421 2.61349 10.1555 2.61349 7.37077C2.61349 4.58601 4.87897 2.32053 7.66374 2.32053Z" fill="currentColor"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_8755_6953">
                                                <rect width="16.9231" height="16.9231" fill="white" transform="translate(0.538574 0.538086)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <input class="w-full bg-white dark:bg-color-47 py-[11px] text-color-89 rounded-lg text-sm font-normal ltr:pl-[42px] rtl:pr-[42px] ltr:pr-3 rtl:pl-3 border border-color-DF dark:border-color-47 font-Figtree chat-search-input" type="text" placeholder="Search character">
                                    </div>
                                    <div class="mt-2 overflow-auto sidebar-scrollbar message-content">
                                        <div class="assistant-content">
                                            @foreach ($assistants as $assistant) 
                                                @continue(!isset($botPlan[$assistant->code]) && !in_array($assistant->code, json_decode($subscriptionBots) ?? []))
                                                <div class="py-[14px] flex justify-between trans-3 items-center gap-4 px-4 search-content cursor-pointer border-b border-[#F6F3F2] dark:border-[#474746] {{ ($bot->id == $assistant->id) ? 'bg-[#763CD4] active-assistant' : 'hover:bg-[#F6F3F2] dark:hover:bg-[#474746]'  }} {{ !in_array($assistant->code, json_decode($subscriptionBots) ?? []) ? 'plan-not-active' : '' }}" id="{{ $assistant->id }}" 
                                                    @if (in_array($assistant->code, json_decode($subscriptionBots) ?? []))
                                                        onclick="fetchChatBot(this)" 
                                                    @endif
                                                    
                                                    @if($bot->id == $assistant->id) data-image="{{ $bot->fileUrl() }}" data-message="{{ $bot->message }}" @endif>
                                                    <div class="flex justify-start items-center gap-3">
                                                        <img class="w-10 h-10 rounded-full object-cover" src="{{ $assistant->fileUrl() }}">
                                                        <div>
                                                            <p class="text-color-14 font-medium text-[15px] leading-[22px] font-Figtree wrap-anywhere text-left line-clamp-single user-name dark:text-white {{ ($bot->id == $assistant->id) ? 'text-white' : ''  }}">
                                                                {{ $assistant->name }} 
                                                                @if (!in_array($assistant->code, json_decode($subscriptionBots) ?? []))
                                                                    <span class="ml-0.5 py-1 px-[7px] text-color-14 text-[11px] leading-3 font-Figtree font-medium rounded-[40px] bg-[#FCCA19]">{{ $botPlan[$assistant->code] }}</span>
                                                                @endif
                                                            </p>
                                                            <p class="text-[12px] leading-[18px] font-Figtree wrap-anywhere font-medium line-clamp-single text-left {{ ($bot->id == $assistant->id) ? 'text-white' : 'text-color-89'  }}">{{ $assistant->role }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="font-Figtree text-[12px] font-normal leading-6 {{ ($bot->id == $assistant->id) ? 'text-white count-conversation' : 'text-color-89'  }}"> {{ $chatConversation[$assistant->id] ?? 0 }} </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <span class="collapse-button cursor-pointer">
                <svg class="half-content-icon hidden" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_8635_4778)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 1C1.22386 1 1 1.22386 1 1.5V12.5C1 12.7761 1.22386 13 1.5 13H12.5C12.7761 13 13 12.7761 13 12.5V1.5C13 1.22386 12.7761 1 12.5 1H1.5ZM0 1.5C0 0.671573 0.671573 0 1.5 0H12.5C13.3284 0 14 0.671573 14 1.5V12.5C14 13.3284 13.3284 14 12.5 14H1.5C0.671573 14 0 13.3284 0 12.5V1.5Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.5C0 3.22386 0.223858 3 0.5 3H13.5C13.7761 3 14 3.22386 14 3.5C14 3.77614 13.7761 4 13.5 4H5V13.5C5 13.7761 4.77614 14 4.5 14C4.22386 14 4 13.7761 4 13.5V4H0.5C0.223858 4 0 3.77614 0 3.5Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_8635_4778">
                    <rect width="14" height="14" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <svg class="full-content-icon" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_8635_4456)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 1C1.22386 1 1 1.22386 1 1.5V12.5C1 12.7761 1.22386 13 1.5 13H12.5C12.7761 13 13 12.7761 13 12.5V1.5C13 1.22386 12.7761 1 12.5 1H1.5ZM0 1.5C0 0.671573 0.671573 0 1.5 0H12.5C13.3284 0 14 0.671573 14 1.5V12.5C14 13.3284 13.3284 14 12.5 14H1.5C0.671573 14 0 13.3284 0 12.5V1.5Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.5C0 3.22386 0.223858 3 0.5 3H13.5C13.7761 3 14 3.22386 14 3.5C14 3.77614 13.7761 4 13.5 4H0.5C0.223858 4 0 3.77614 0 3.5Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_8635_4456">
                    <rect width="14" height="14" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
            </span>
        </div>
        <div class="chat-view-close-button cursor-pointer flex items-center">
            <span class="neg-transition-scale inline-flex p-2">
                <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.585786 0.335786 0.25 0.75 0.25H11.25C11.6642 0.25 12 0.585786 12 1C12 1.41421 11.6642 1.75 11.25 1.75H0.75C0.335786 1.75 0 1.41421 0 1Z" fill="white"/>
                </svg>
            </span>
        </div>
    </div>
    @auth
    <div class="chat-view-body">
        <div class="flex flex-col bg-[#2c2c2c] rounded-b-xl chat-sidebar">
            <div class="chat-view-sidebar chat-header-sidebar-mobile relative sidebar-scrollbar">
                <div>
                    <div class="chat-sidebar-users p-2 flex flex-col gap-2" id ="user-img" data-url ="{{ Auth()->user() ? Auth()->user()->fileUrl() : '' }}" data-next-page-url="{{ $contacts->nextPageUrl() }}">
                        @foreach($contacts as $contact)
                        <div class="chat-sidebar-user border trans-3 bg-[#3A3A39] border-[#474746] rounded chat-list list-{{ $contact->chat_conversation_id }}" id="{{ $contact->chat_conversation_id }}">
                            <div>
                                <div class="flex justify-between items-center relative title-container">
                                    <p class="editable-title text-white text-left text-[13px] font-medium font-Figtree leading-5 wrap-anywhere">{{ $contact->title }}</p>
                                    <div class="flex gap-2">
                                        <a class="edit-icon text-white justify-center hidden" id="{{ $contact->chat_conversation_id }}" href="javascript: void(0)">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58613 2.52592C10.2566 1.82469 11.3435 1.82469 12.0139 2.52592C12.6844 3.22715 12.6844 4.36406 12.0139 5.06529L5.10446 12.2923C5.09357 12.3037 5.08278 12.315 5.07208 12.3262C4.91398 12.4919 4.77459 12.6379 4.60655 12.7456C4.45892 12.8403 4.29797 12.91 4.12961 12.9523C3.93797 13.0004 3.74066 13.0002 3.51687 13C3.50172 13 3.48645 12.9999 3.47105 12.9999H2.55005C2.2463 12.9999 2.00006 12.7424 2.00006 12.4247V11.4614C2.00006 11.4453 2.00004 11.4293 2.00003 11.4134C1.99982 11.1794 1.99964 10.973 2.04565 10.7725C2.08606 10.5964 2.15273 10.4281 2.2432 10.2737C2.34618 10.0979 2.48583 9.95213 2.64422 9.78677C2.65494 9.77558 2.66575 9.76429 2.67664 9.7529L9.58613 2.52592ZM11.2361 3.33948C10.9953 3.08756 10.6048 3.08756 10.3639 3.33948L3.45445 10.5665C3.24569 10.7848 3.2072 10.8303 3.1811 10.8748C3.15094 10.9263 3.12872 10.9824 3.11525 11.0411C3.10359 11.0919 3.10005 11.1526 3.10005 11.4614V11.8494H3.47105C3.76628 11.8494 3.82425 11.8457 3.87282 11.8335C3.92894 11.8194 3.98259 11.7962 4.0318 11.7646C4.0744 11.7373 4.11789 11.6971 4.32665 11.4787L11.2361 4.25173C11.477 3.99982 11.477 3.59139 11.2361 3.33948ZM6.95002 12.4247C6.95002 12.107 7.19627 11.8494 7.50002 11.8494H12.45C12.7538 11.8494 13 12.107 13 12.4247C13 12.7424 12.7538 12.9999 12.45 12.9999H7.50002C7.19627 12.9999 6.95002 12.7424 6.95002 12.4247Z" fill="white"/>
                                            </svg>
                                        </a>
                                        <a class="text-white justify-center chat-modal hidden" href="javascript: void(0)" id="{{ $contact->chat_conversation_id }}">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6665 1.75033C4.6665 1.42816 4.92767 1.16699 5.24984 1.16699H8.74984C9.072 1.16699 9.33317 1.42816 9.33317 1.75033C9.33317 2.07249 9.072 2.33366 8.74984 2.33366H5.24984C4.92767 2.33366 4.6665 2.07249 4.6665 1.75033ZM2.91198 2.91699H1.74984C1.42767 2.91699 1.1665 3.17816 1.1665 3.50033C1.1665 3.82249 1.42767 4.08366 1.74984 4.08366H2.37076L2.74509 9.6985C2.77446 10.1392 2.79876 10.5038 2.84235 10.8007C2.88772 11.1097 2.9597 11.3921 3.10964 11.6553C3.34306 12.0651 3.69513 12.3944 4.11947 12.6001C4.39206 12.7322 4.67864 12.7852 4.99002 12.8099C5.28909 12.8337 5.65457 12.8337 6.09622 12.8337H7.90346C8.34511 12.8337 8.71059 12.8337 9.00966 12.8099C9.32104 12.7852 9.60762 12.7322 9.8802 12.6001C10.3045 12.3944 10.6566 12.0651 10.89 11.6553C11.04 11.3921 11.112 11.1097 11.1573 10.8007C11.2009 10.5038 11.2252 10.1391 11.2546 9.69842L11.6289 4.08366H12.2498C12.572 4.08366 12.8332 3.82249 12.8332 3.50033C12.8332 3.17816 12.572 2.91699 12.2498 2.91699H11.0877C11.0843 2.91696 11.0809 2.91696 11.0775 2.91699H2.92219C2.91879 2.91696 2.91539 2.91696 2.91198 2.91699ZM10.4597 4.08366H3.54002L3.90763 9.59778C3.93894 10.0674 3.96058 10.3856 3.99664 10.6312C4.03166 10.8697 4.07445 10.992 4.12335 11.0778C4.24006 11.2827 4.41609 11.4474 4.62826 11.5502C4.71716 11.5933 4.842 11.6278 5.08234 11.6469C5.32977 11.6666 5.64875 11.667 6.11939 11.667H7.88029C8.35092 11.667 8.66991 11.6666 8.91734 11.6469C9.15767 11.6278 9.28251 11.5933 9.37141 11.5502C9.58358 11.4474 9.75962 11.2827 9.87633 11.0778C9.92523 10.992 9.96802 10.8697 10.003 10.6312C10.0391 10.3856 10.0607 10.0674 10.092 9.59778L10.4597 4.08366ZM5.83317 5.54199C6.15534 5.54199 6.4165 5.80316 6.4165 6.12533V9.04199C6.4165 9.36416 6.15534 9.62533 5.83317 9.62533C5.511 9.62533 5.24984 9.36416 5.24984 9.04199V6.12533C5.24984 5.80316 5.511 5.54199 5.83317 5.54199ZM8.1665 5.54199C8.48867 5.54199 8.74984 5.80316 8.74984 6.12533V9.04199C8.74984 9.36416 8.48867 9.62533 8.1665 9.62533C7.84434 9.62533 7.58317 9.36416 7.58317 9.04199V6.12533C7.58317 5.80316 7.84434 5.54199 8.1665 5.54199Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="py-2 px-1.5">
                <button class="text-[13px] font-Figtree font-semibold leading-5 text-white cursor-pointer new-chat w-full py-3 rounded-lg magic-bg flex justify-center items-center gap-2 wrap-anywhere">
                    <span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.75C7.24162 1.75 7.4375 1.94588 7.4375 2.1875V6.5625H11.8125C12.0541 6.5625 12.25 6.75838 12.25 7C12.25 7.24162 12.0541 7.4375 11.8125 7.4375H7.4375V11.8125C7.4375 12.0541 7.24162 12.25 7 12.25C6.75837 12.25 6.5625 12.0541 6.5625 11.8125V7.4375H2.1875C1.94588 7.4375 1.75 7.24162 1.75 7C1.75 6.75838 1.94588 6.5625 2.1875 6.5625H6.5625V2.1875C6.5625 1.94588 6.75838 1.75 7 1.75Z" fill="white"/>
                        </svg>  
                    </span>
                    {{ __('New Chat') }}
                </button>
            </div>
        </div>
        <div class="relative chat-view-inbox dark:bg-[#383837] chat-content">
            <div class="chat-inbox-loader-overlay hidden">
                <span class="loader-container">
                    <span class="icon-spinner"></span>
                </span>
            </div>
            <div class="chat-inbox-body">
                <ul class="chat-inbox-message-list">
                    <li class="chat-inbox-single-item chat-inbox-sent ">

                    </li>
                    <li class="chat-inbox-single-item chat-inbox-received">
                        <div class="chat-inbox-single-avatar">
                            <img src="{{$bot->fileUrl() }}" alt="chat-robot">
                        </div>
                        <div>
                            <div class="chat-inbox-single-content">
                                <code class="font-Figtree whitespace-pre-wrap">{{ $bot->message }}</code>
                            </div>
                         </div>
                    </li>
                </ul>
                <div class="chat-bubble hidden">
                    <div class="flex gap-2 pb-2.5">
                        <div class="chat-inbox-single-avatar">
                            <img src="{{$bot->fileUrl() }}" alt="chat-robot">
                        </div>
                        <div class="typing chat-inbox-single-content">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="messageId" value="">
                <input type="hidden" id="botId" value="{{ $bot->id }}">
            </div>
            <form class="chat-inbox-footer" id="message-form" method="post" enctype="multipart/form-data">
                <div class="chat-error-message">
                    <ul>
                    </ul>
                </div>
                <div class="chat-inbox-input-group">
                    <div class="chat-inbox-text-input">
                        <textarea class="sidebar-scrollbar font-Figtree" name="inbox_message" id="message-to-send" placeholder='{{ __("Write your message..") }}' rows="1" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="chat-inbox-send-button">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_4393_3469)">
                            <circle cx="40" cy="28" r="20" fill="url(#paint0_linear_4393_3469)" />
                        </g>
                        <path d="M34.1489 25.1492L35.5395 27.7123C35.748 28.0967 35.8523 28.2889 35.8523 28.5C35.8523 28.7111 35.748 28.9033 35.5395 29.2877L34.1489 31.8508C33.2265 33.5509 32.7653 34.401 33.1191 34.8255C33.4728 35.25 34.3179 34.8607 36.008 34.0819L36.008 34.0819L44.9892 29.9433C46.3297 29.3256 47 29.0168 47 28.5C47 27.9832 46.3297 27.6744 44.9892 27.0567L36.008 22.9181C34.3179 22.1393 33.4728 21.75 33.1191 22.1745C32.7653 22.599 33.2265 23.4491 34.1489 25.1492Z" fill="white" />
                        <defs>
                            <filter id="filter0_d_4393_3469" x="0" y="0" width="80" height="80" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feMorphology radius="15" operator="erode" in="SourceAlpha" result="effect1_dropShadow_4393_3469" />
                                <feOffset dy="12" />
                                <feGaussianBlur stdDeviation="17.5" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0.462745 0 0 0 0 0.235294 0 0 0 0 0.831373 0 0 0 1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4393_3469" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4393_3469" result="shape" />
                            </filter>
                            <linearGradient id="paint0_linear_4393_3469" x1="46.0069" y1="43.0768" x2="32.122" y2="11.7432" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#E60C84" />
                                <stop offset="1" stop-color="#FFCF4B" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="no-msg-container chat-history">
        <div class="login-chat-message-design">
            <svg class="msg-header-icon text-[#2c2c2c] dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 19" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.94606 4.0182e-07H10.0539C11.4126 -1.49762e-05 12.5083 -2.74926e-05 13.3874 0.0894005C14.2948 0.181709 15.0817 0.377504 15.7779 0.842653C16.3238 1.20745 16.7926 1.6762 17.1573 2.22215C17.6225 2.91829 17.8183 3.70523 17.9106 4.61264C18 5.49173 18 6.58738 18 7.94604V8.05396C18 9.41262 18 10.5083 17.9106 11.3874C17.8183 12.2948 17.6225 13.0817 17.1573 13.7778C16.7926 14.3238 16.3238 14.7926 15.7778 15.1573C15.1699 15.5636 14.4931 15.7642 13.7267 15.8701C13.1247 15.9534 12.4279 15.9827 11.6213 15.9935L10.7889 17.6584C10.0518 19.1325 7.94819 19.1325 7.21115 17.6584L6.37872 15.9935C5.57211 15.9827 4.87525 15.9534 4.2733 15.8701C3.50685 15.7642 2.83014 15.5636 2.22215 15.1573C1.6762 14.7926 1.20745 14.3238 0.842653 13.7778C0.377504 13.0817 0.181709 12.2948 0.0894005 11.3874C-2.74926e-05 10.5083 -1.49762e-05 9.41261 4.0182e-07 8.05394V7.94606C-1.49762e-05 6.58739 -2.74926e-05 5.49174 0.0894005 4.61264C0.181709 3.70523 0.377504 2.91829 0.842653 2.22215C1.20745 1.6762 1.6762 1.20745 2.22215 0.842653C2.91829 0.377504 3.70523 0.181709 4.61264 0.0894005C5.49174 -2.74926e-05 6.58739 -1.49762e-05 7.94606 4.0182e-07ZM4.81505 2.07913C4.06578 2.15535 3.64604 2.29662 3.33329 2.50559C3.00572 2.72447 2.72447 3.00572 2.50559 3.33329C2.29662 3.64604 2.15535 4.06578 2.07913 4.81505C2.00121 5.58104 2 6.57472 2 8C2 9.42527 2.00121 10.419 2.07913 11.1849C2.15535 11.9342 2.29662 12.354 2.50559 12.6667C2.72447 12.9943 3.00572 13.2755 3.33329 13.4944C3.60665 13.6771 3.96223 13.8081 4.54716 13.889C5.14815 13.9721 5.92075 13.9939 7.00436 13.9986C7.40885 14.0004 7.75638 14.2421 7.91233 14.5886L9 16.7639L10.0877 14.5886C10.2436 14.2421 10.5912 14.0004 10.9956 13.9986C12.0792 13.9939 12.8518 13.9721 13.4528 13.889C14.0378 13.8081 14.3933 13.6771 14.6667 13.4944C14.9943 13.2755 15.2755 12.9943 15.4944 12.6667C15.7034 12.354 15.8446 11.9342 15.9209 11.1849C15.9988 10.419 16 9.42527 16 8C16 6.57472 15.9988 5.58104 15.9209 4.81505C15.8446 4.06578 15.7034 3.64604 15.4944 3.33329C15.2755 3.00572 14.9943 2.72447 14.6667 2.50559C14.354 2.29662 13.9342 2.15535 13.1849 2.07913C12.419 2.00121 11.4253 2 10 2H8C6.57473 2 5.58104 2.00121 4.81505 2.07913Z" fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 6C5 5.44772 5.44772 5 6 5L12 5C12.5523 5 13 5.44772 13 6C13 6.55228 12.5523 7 12 7L6 7C5.44772 7 5 6.55228 5 6Z" fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 10C5 9.44772 5.44772 9 6 9H9C9.55228 9 10 9.44772 10 10C10 10.5523 9.55228 11 9 11H6C5.44772 11 5 10.5523 5 10Z" fill="currentColor" />
            </svg>
            <p class="new-conv ml-3">
                {!! __('You need to :x to initiate chat.', ['x' => '<a class="underline font-semibold" href=' . route('login')  . '>' . __('login') . '</a>']) !!}
            </p>
        </div>
    </div>
    @endauth
</div>
