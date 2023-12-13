<nav class="side-nav">
    <a href="{{ route('admin.home') }}" class="intro-x flex items-center pl-5 pt-4">
{{--        <img class="w-6" src="">--}}
        <span class="hidden xl:block text-white text-lg ml-3"> Blog</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin.home') }}" class="side-menu side-menu--active">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </div>
                <div class="side-menu__title">
                    Главная
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Записи
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="subMenu">
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Все записи </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.create') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Добавить новую </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Категории </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Теги </div>
                    </a>
                </li>
            </ul>
        </li>

{{--        <li>--}}
{{--            <a href="{{ route('admin.pages.index') }}" class="side-menu">--}}
{{--                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>--}}
{{--                <div class="side-menu__title"> Страницы </div>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('admin.media.index') }}" class="side-menu">--}}
{{--                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>--}}
{{--                <div class="side-menu__title"> Медиафайлы </div>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
