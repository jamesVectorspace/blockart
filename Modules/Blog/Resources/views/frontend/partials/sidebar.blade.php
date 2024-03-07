<section class="md:w-[270px] w-full pb-px">
    <div class="mb-[30px]">
        <div class="flex">
            <div class="relative w-full">
                <form action="{{ route('blog.search') }}" method="get">
                    <div class="h-[50px] focus:border-color-2C lg:w-[270px] w-full rounded border text-decoration-none hover:border-gray-200 border-color-DF">
                        <input class="border-none text-14 h-12 w-full pr-12 text-color-89 dark:text-color-DF dark:bg-color-29 dark:rounded-xl mr-0.5 blog-search" type="text" name="search" value="{{request()->search}}" placeholder="{{ __('Search your keyword') }}..">
                    </div>
                    <div class="absolute top-4 right-5 search-button">
                        <button type="submit">
                            <svg class="cursor-pointer text-color-2C dark:text-white neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2ZM0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2929 13.2929C13.6834 12.9024 14.3166 12.9024 14.7071 13.2929L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L13.2929 14.7071C12.9024 14.3166 12.9024 13.6834 13.2929 13.2929Z" fill="currentColor" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md:block hidden mb-[30px]">
        <div class="relative flex mb-1 border-none">
            <span class="text-16 font-medium text-color-2C dark:text-white capitalize mb-2">{{ __('Categories') }}</span>
        </div>
        <div class="border mb-5 lg:w-[270px] w-full border-line"></div>
        <ul>
            @foreach ($blogCategories as $blogCategory)
                <li class="text-15 transition ease-in-out delay-120 mb-3 font-medium">
                    <a href="{{ route('blog.category', ['id' => $blogCategory->id]) }}" class="flex items-center hover:text-color-2C dark:hover:text-white {{ (request('id') || request('slug')) && $blogCategory->name == $blog?->blogCategory?->name ? ' dark:text-white font-bold' : ' dark:text-color-DF' }} text-color-89 text-15 cursor-pointer">{{ $blogCategory->name }} </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mb-[30px]">
        <div class="mb-1 border-none lg:w-[270px] w-full">
            <span class="text-16 font-medium text-color-2C dark:text-white capitalize mb-2">{{ __('popular post') }}</span>
        </div>
        <div class="border mb-5 lg:w-[270px] w-full border-line"></div>
        @foreach ($popularBlogs as $data)
                <div class="flex mb-5 gap-3">
                    <a class="h-20 lg:w-20 w-28" href="{{ route('blog.details', ['slug' => $data->slug]) }}">
                        <img class="h-20 lg:w-20 w-28 rounded object-cover neg-transition-scale" src="{{ $data->fileUrl() }}" alt="{{ $data->title }}">
                    </a>
                    <div class="w-44 flex flex-col">
                        <p class="text-12 font-medium text-color-89 dark:text-color-DF">{{ formatDate($data->created_at) }}</p>
                        <a href="{{ route('blog.details', $data->slug) }}"
                            class="mt-3 md:mt-0  text-color-2C dark:text-white font-medium text-sm mb-2"
                            title="{{ $data->title }}">{{ trimWords($data->title, 45) }}
                        </a>
                    </div>
                </div>
        @endforeach
    </div>
</section>
