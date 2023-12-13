<!-- BEGIN: Search -->
<div class="intro-x relative mr-3 sm:mr-6 mainTopSearch">
    <div class="search hidden sm:block">
        <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Поиск...">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search__icon dark:text-gray-300"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </div>
    <a class="notification sm:hidden" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search notification__icon dark:text-gray-300"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </a>
    <div class="search-result">

    </div>
</div>
<!-- END: Search -->

<!-- BEGIN: Account Menu -->
{{--<div class="intro-x dropdown w-8 h-8">--}}
{{--    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">--}}
{{--        @if( $user = Auth::user() )--}}
{{--            <img alt="{{ $user->display_name }}" src="{{ $user->thumb_name ? asset('photos/' . $user->thumb_name) : asset('admin/images/no-image.png') }}">--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="dropdown-menu w-56">--}}
{{--        <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">--}}
{{--            <div class="p-4 border-b border-theme-27 dark:border-dark-3">--}}
{{--                <div class="font-medium">{{ Auth::user()->display_name }}</div>--}}
{{--                <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{ Auth::user()->role->name }}</div>--}}
{{--            </div>--}}
{{--            <div class="p-2">--}}
{{--                <a href="{{ route('admin.profile.index') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Профиль </a>--}}
{{--                <a href="{{ route('admin.profile.changepassword.index') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Сбросить пароль </a>--}}
{{--            </div>--}}
{{--            <div class="p-2 border-t border-theme-27 dark:border-dark-3">--}}
{{--                <a href="{{ route('auth.logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-right w-4 h-4 mr-2"><rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="16" cy="12" r="3"></circle></svg> Выход </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- END: Account Menu -->
