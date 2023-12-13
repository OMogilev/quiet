<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Homepage</title>
    <meta name="description" content="">

    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
</head>

<body class="home-template">

    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="global-icons" style="display:none">
        <symbol id="i-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/>
            <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></symbol>
        <symbol id="i-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 7a7 7 0 0 0 12 4.9v.1c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2h.1A6.979 6.979 0 0 0 10 7zm-6 5a8 8 0 0 0 15.062 3.762A9 9 0 0 1 8.238 4.938 7.999 7.999 0 0 0 4 12z"/></symbol>
        <symbol id="i-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"/></symbol>
        <symbol id="i-twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"/></symbol>
        <symbol id="i-facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></symbol>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 22a8 8 0 1 1 16 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"/></svg>
        <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 22a8 8 0 1 1 16 0H4zm9-5.917V20h4.659A6.009 6.009 0 0 0 13 16.083zM11 20v-3.917A6.009 6.009 0 0 0 6.341 20H11zm1-7c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"/></svg>
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"/></symbol>
        <symbol id="i-calendar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm3 8H4v8h16v-8zm-5-6H9v2H7V5H4v4h16V5h-3v2h-2V5zm-9 8h2v2H6v-2zm5 0h2v2h-2v-2zm5 0h2v2h-2v-2z"/></symbol>
        <symbol id="i-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8h4v2h-6V7h2v5z"/></symbol>
        <symbol id="i-map-pin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></symbol>
        <symbol id="i-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"/></symbol>
        <symbol id="i-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></symbol>
        <symbol id="i-arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"/></symbol>
        <symbol id="i-arrow-right"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"/></symbol>
    </svg>

    <div class="site-wrap">
    <header class="site-header">
        <div class="container">
            <div class="header-inner flex justify-space-between">
                <div class="header-logo">
                    <a href="https://neon.gbjsolution.com" class="logo-image theme-light-logo">
                        <img src="https://neon.gbjsolution.com/content/images/2022/12/logo-dark.svg" alt="Neon">
                    </a>
                    <a href="https://neon.gbjsolution.com" class="logo-image theme-dark-logo">
                        <img src="https://neon.gbjsolution.com/content/images/2022/12/logo-light.svg" alt="Neon">
                    </a>
                </div>
                <input id="mobile-menu-toggle" class="mobile-menu-checkbox" type="checkbox">
                <label for="mobile-menu-toggle" class="mobile-menu-icon" aria-label="menu toggle button">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="sr-only">Menu toggle button</span>
                </label>
                <nav class="nav-wrap flex" role="navigation" aria-label="main navigation">
                    <ul class="nav-item-container nav-left no-style-list flex" role="menu">
                        <li class="nav-item" role="menuitem">
                            <a href="/features/" class="nav-link">Features</a>
                        </li>
                        <li class="nav-item" role="menuitem">
                            <a href="/style-guide/" class="nav-link">Style Guide</a>
                        </li>
                        <li class="nav-item" role="menuitem">
                            <a href="/tags/" class="nav-link">Tags</a>
                        </li>
                        <li class="nav-item" role="menuitem">
                            <a href="/authors/" class="nav-link">Authors</a>
                        </li>
                        <li class="nav-item has-dropdown" role="menuitem">
                            <a href="#" class="nav-link more-link">More
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                                </svg>
                            </a>
                            <ul class="no-style-list dropdown-menu">
                                <li class="nav-item" role="menuitem">
                                    <a href="/home-2/" class="nav-link">Home post vertical</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/home-3/" class="nav-link">Home post masonry</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/never-let-your-memories-be-greater-than-your-dreams/" class="nav-link">Post
                                        fullwidth</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/i-do-not-stick-to-rules-when-cooking-i-rely-on-my-imagination/"
                                       class="nav-link">Post no sidebar</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/stop-worrying-about-the-potholes-in-the-road-and-enjoy-the-journey/"
                                       class="nav-link">Post cover auto height</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/self-observation-is-the-first-step-of-inner-unfolding/" class="nav-link">Post
                                        with TOC</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/tags-2/" class="nav-link">Tag style two</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/author-2/" class="nav-link">Author style two</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/author-3/" class="nav-link">Author style three</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/yearly-archive/" class="nav-link">Yearly archive</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/monthly-archive/" class="nav-link">Monthly archive</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/contact/" class="nav-link">Contact</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="https://gbjsolution.com/documentation/ghost-themes/neon/" class="nav-link">Documentation</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="nav-center icon-items-wrap flex">
                        <button href="javascript:;" class="nav-icon search-icon flex" data-ghost-search="">
                            <span><svg><use xlink:href="#i-search"></use></svg></span>
                        </button>
                        <button href="javascript:;" class="nav-icon theme-icon flex js-toggle-dark-light"
                                aria-label="Toggle theme">
                            <div class="toggle-mode flex">
                                <div class="light">
                                    <svg>
                                        <use xlink:href="#i-sun"></use>
                                    </svg>
                                </div>
                                <span class="dark"><svg><use xlink:href="#i-moon"></use></svg></span>
                            </div>
                        </button>
                    </div>
                    <ul class="nav-item-container nav-right no-style-list flex">
                        <li class="nav-item" role="menuitem">
                            <a href="https://neon.gbjsolution.com/signin/" class="nav-link">Sign in</a>
                        </li>
                        <li class="nav-item" role="menuitem">
                            <a href="/membership/" class="btn btn-sm">Become member</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <div class="container">
        <div class="row main-content " style="position: relative;">
            <div class="col-lg-8">
                {{ $slot }}

                <div class="pagination-wrap text-center" id="pagination-wrap">
                    <button class="btn post-load-button" id="load-more"><span>Load more</span></button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar sidebar-sticky">
                    <div class="sidebar-wrap">
                        <div class="widget widget-posts">
                            <h3 class="h4 widget-title">Featured posts</h3>
                            <div class="widget-content">
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/never-let-your-memories-be-greater-than-your-dreams/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1513436539083-9d2127e742f1?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxkcmVhbXxlbnwwfHx8fDE2NzE0MzA3MTU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="Never let your memories be greater than your dreams"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/never-let-your-memories-be-greater-than-your-dreams/">Never let
                                                your memories be greater than your dreams</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>3 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/self-observation-is-the-first-step-of-inner-unfolding/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1574102289244-69b848408915?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDExfHxvYnNlcnZhdGlvbnxlbnwwfHx8fDE2NzE0MzExODM&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="Self-observation is the first step of inner unfolding"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/self-observation-is-the-first-step-of-inner-unfolding/">Self-observation
                                                is the first step of inner unfolding</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>4 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/the-mind-and-body-are-not-separate-what-affects-one-affects-the-other/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1593164842264-854604db2260?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDl8fHlvZ2F8ZW58MHx8fHwxNjcxNDMxNTUx&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="The mind and body are not separate. what affects one, affects the other"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/the-mind-and-body-are-not-separate-what-affects-one-affects-the-other/">The
                                                mind and body are not separate. what affects one, affects the other</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>3 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="widget widget-tags">
                            <h3 class="h4 widget-title">Tags</h3>
                            <div class="widget-content">
                                <div class="tag-list">
                                    <a href="/tag/food/"><span class="tag-accent" style="background: #B43ADF;"></span>Food</a>
                                    <a href="/tag/health/"><span class="tag-accent" style="background: #1dbf2f;"></span>Health</a>
                                    <a href="/tag/inspiration/"><span class="tag-accent"
                                                                      style="background: #04baf6;"></span>Inspiration</a>
                                    <a href="/tag/lifestyle/"><span class="tag-accent"
                                                                    style="background: #4d61ff;"></span>Lifestyle</a>
                                    <a href="/tag/nature/"><span class="tag-accent" style="background: #fd94ff;"></span>Nature</a>
                                    <a href="/tag/technology/"><span class="tag-accent"
                                                                     style="background: #f18509;"></span>Technology</a>
                                    <a href="/tag/travel/"><span class="tag-accent" style="background: #E10689;"></span>Travel</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-posts">
                            <h3 class="h4 widget-title">Latest posts</h3>
                            <div class="widget-content">
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/autumn-is-a-second-spring-when-every-leaf-is-a-flower/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1665686440627-936e9700a100?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wxfDF8YWxsfDF8fHx8fHwyfHwxNjcxMjc4Mjc5&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="Autumn is a second spring when every leaf is a flower"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/autumn-is-a-second-spring-when-every-leaf-is-a-flower/">Autumn is
                                                a second spring when every leaf is a flower</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>4 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/never-let-your-memories-be-greater-than-your-dreams/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1513436539083-9d2127e742f1?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxkcmVhbXxlbnwwfHx8fDE2NzE0MzA3MTU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="Never let your memories be greater than your dreams"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/never-let-your-memories-be-greater-than-your-dreams/">Never let
                                                your memories be greater than your dreams</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>3 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-small flex">
                                    <div class="post-img-container">
                                        <a href="/dramatically-improve-your-cooking-using-just-your-imagination/"
                                           class="post-img-wrap">
                                            <img
                                                src="https://images.unsplash.com/photo-1619735007512-34004ec2f348?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDMyfHxpbWFnaW5hdGlvbnxlbnwwfHx8fDE2NzE0MzA4NDI&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                                alt="Dramatically improve your cooking using just your imagination"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="post-info-wrap">
                                        <h3 class="post-title h5">
                                            <a href="/dramatically-improve-your-cooking-using-just-your-imagination/">Dramatically
                                                improve your cooking using just your imagination</a>
                                        </h3>
                                        <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>4 min read
                    </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="widget widget-newsletter widget-newsletter-colored">
                            <h3 class="h2 widget-title text-center">Newsletter</h3>
                            <div class="widget-content">
                                <div class="text-copy text-center">
                                    Get the latest posts delivered straight to your inbox.
                                </div>
                                <form data-members-form="subscribe">
                                    <div class="form-field-wrap field-group-inline">
                                        <label for="name" class="sr-only">Name</label>
                                        <input data-members-name="" type="text" class="form-field input-field" id="name"
                                               placeholder="Your name" required="" autocomplete="off">
                                        <label for="email" class="sr-only">Email</label>
                                        <input data-members-email="" type="email" class="form-field input-field"
                                               id="email" placeholder="Your email address" required=""
                                               autocomplete="off"
                                               style="background-size: auto, 25px; background-image: none, url(&quot;data:image/svg+xml;utf8,<svg width='26' height='28' viewBox='0 0 26 28' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M23.8958 6.1084L13.7365 0.299712C13.3797 0.103027 12.98 0 12.5739 0C12.1678 0 11.7682 0.103027 11.4113 0.299712L1.21632 6.1084C0.848276 6.31893 0.54181 6.62473 0.328154 6.99462C0.114498 7.36452 0.00129162 7.78529 7.13608e-05 8.21405V19.7951C-0.00323007 20.2248 0.108078 20.6474 0.322199 21.0181C0.53632 21.3888 0.845275 21.6938 1.21632 21.9008L11.3756 27.6732C11.7318 27.8907 12.1404 28.0037 12.556 27.9999C12.9711 27.9989 13.3784 27.8861 13.7365 27.6732L23.8958 21.9008C24.2638 21.6903 24.5703 21.3845 24.7839 21.0146C24.9976 20.6447 25.1108 20.2239 25.112 19.7951V8.21405C25.1225 7.78296 25.0142 7.35746 24.7994 6.98545C24.5845 6.61343 24.2715 6.30969 23.8958 6.1084Z' fill='url(%23paint0_linear_714_179)'/><path d='M5.47328 17.037L4.86515 17.4001C4.75634 17.4613 4.66062 17.5439 4.58357 17.643C4.50652 17.7421 4.4497 17.8558 4.4164 17.9775C4.3831 18.0991 4.374 18.2263 4.38963 18.3516C4.40526 18.4768 4.44531 18.5977 4.50743 18.707C4.58732 18.8586 4.70577 18.9857 4.85046 19.0751C4.99516 19.1645 5.16081 19.2129 5.33019 19.2153C5.49118 19.2139 5.64992 19.1767 5.79522 19.1064L6.40335 18.7434C6.51216 18.6822 6.60789 18.5996 6.68493 18.5004C6.76198 18.4013 6.8188 18.2876 6.8521 18.166C6.8854 18.0443 6.8945 17.9171 6.87887 17.7919C6.86324 17.6666 6.82319 17.5458 6.76107 17.4364C6.70583 17.3211 6.62775 17.2185 6.53171 17.1352C6.43567 17.0518 6.32374 16.9895 6.20289 16.952C6.08205 16.9145 5.95489 16.9027 5.82935 16.9174C5.70382 16.932 5.5826 16.9727 5.47328 17.037ZM9.19357 14.8951L7.94155 15.6212C7.83273 15.6824 7.73701 15.7649 7.65996 15.8641C7.58292 15.9632 7.52609 16.0769 7.49279 16.1986C7.4595 16.3202 7.4504 16.4474 7.46603 16.5726C7.48166 16.6979 7.5217 16.8187 7.58383 16.9281C7.66371 17.0797 7.78216 17.2068 7.92686 17.2962C8.07155 17.3856 8.23721 17.434 8.40658 17.4364C8.56757 17.435 8.72631 17.3978 8.87162 17.3275L10.1236 16.6014C10.2325 16.5402 10.3282 16.4576 10.4052 16.3585C10.4823 16.2594 10.5391 16.1457 10.5724 16.024C10.6057 15.9024 10.6148 15.7752 10.5992 15.6499C10.5835 15.5247 10.5435 15.4038 10.4814 15.2944C10.4261 15.1791 10.348 15.0766 10.252 14.9932C10.156 14.9099 10.044 14.8475 9.92318 14.8101C9.80234 14.7726 9.67518 14.7608 9.54964 14.7754C9.42411 14.7901 9.30289 14.8308 9.19357 14.8951ZM14.2374 13.1198C14.187 13.0168 14.1167 12.9251 14.0307 12.8503C13.9446 12.7754 13.8446 12.7189 13.7366 12.6842V5.38336C13.7371 5.2545 13.7124 5.12682 13.6641 5.00768C13.6157 4.88854 13.5446 4.78029 13.4548 4.68917C13.365 4.59806 13.2583 4.52587 13.1409 4.47678C13.0235 4.42769 12.8977 4.40266 12.7708 4.40314C12.6457 4.40355 12.522 4.42946 12.407 4.47933C12.292 4.52919 12.188 4.602 12.1013 4.69343C12.0145 4.78485 11.9467 4.89304 11.902 5.01156C11.8572 5.13007 11.8364 5.25651 11.8407 5.38336V12.7168C11.7327 12.7516 11.6327 12.8081 11.5466 12.883C11.4606 12.9578 11.3903 13.0495 11.3399 13.1525C11.2727 13.2801 11.2346 13.4213 11.2284 13.5659C11.2222 13.7104 11.2481 13.8545 11.3041 13.9875C11.2481 14.1205 11.2222 14.2646 11.2284 14.4091C11.2346 14.5536 11.2727 14.6949 11.3399 14.8225C11.3903 14.9255 11.4606 15.0172 11.5466 15.092C11.6327 15.1669 11.7327 15.2233 11.8407 15.2581V22.5916C11.8407 22.8516 11.9425 23.1009 12.1236 23.2847C12.3047 23.4686 12.5504 23.5718 12.8065 23.5718C13.0627 23.5718 13.3084 23.4686 13.4895 23.2847C13.6706 23.1009 13.7724 22.8516 13.7724 22.5916V15.2218C13.8804 15.187 13.9804 15.1305 14.0664 15.0557C14.1525 14.9809 14.2228 14.8892 14.2732 14.7862C14.3404 14.6586 14.3785 14.5173 14.3847 14.3728C14.3909 14.2283 14.365 14.0842 14.309 13.9512C14.3917 13.6751 14.3661 13.3772 14.2374 13.1198ZM16.6735 10.6112L15.4215 11.3373C15.3127 11.3985 15.2169 11.481 15.1399 11.5802C15.0628 11.6793 15.006 11.793 14.9727 11.9147C14.9394 12.0363 14.9303 12.1635 14.946 12.2887C14.9616 12.414 15.0016 12.5348 15.0638 12.6442C15.1436 12.7958 15.2621 12.9229 15.4068 13.0123C15.5515 13.1017 15.7171 13.1501 15.8865 13.1525C16.0475 13.1511 16.2062 13.1139 16.3515 13.0436L17.6036 12.3175C17.7124 12.2563 17.8081 12.1737 17.8851 12.0746C17.9622 11.9755 18.019 11.8617 18.0523 11.7401C18.0856 11.6184 18.0947 11.4913 18.0791 11.366C18.0635 11.2408 18.0234 11.1199 17.9613 11.0105C17.906 10.8952 17.828 10.7927 17.7319 10.7093C17.6359 10.626 17.524 10.5636 17.4031 10.5261C17.2823 10.4887 17.1551 10.4769 17.0296 10.4915C16.904 10.5061 16.7828 10.5469 16.6735 10.6112ZM19.639 10.9742C19.8 10.9728 19.9587 10.9357 20.104 10.8653L20.7122 10.5023C20.8208 10.4406 20.9164 10.3578 20.9935 10.2586C21.0705 10.1593 21.1275 10.0456 21.1611 9.92394C21.1947 9.80228 21.2043 9.67508 21.1893 9.54965C21.1744 9.42421 21.1351 9.30302 21.0739 9.19302C21.0126 9.08303 20.9305 8.9864 20.8324 8.90869C20.7342 8.83098 20.6219 8.77372 20.5019 8.7402C20.3818 8.70667 20.2564 8.69755 20.1329 8.71335C20.0094 8.72915 19.8902 8.76957 19.7821 8.83227L19.174 9.19531C19.0651 9.25651 18.9694 9.33909 18.8924 9.43822C18.8153 9.53735 18.7585 9.65106 18.7252 9.77271C18.6919 9.89436 18.6828 10.0215 18.6984 10.1468C18.7141 10.272 18.7541 10.3929 18.8162 10.5023C18.8981 10.6494 19.018 10.7711 19.163 10.8543C19.308 10.9374 19.4725 10.9789 19.639 10.9742ZM20.7122 17.4001L20.104 17.037C19.8859 16.9133 19.6284 16.8823 19.3878 16.9508C19.1472 17.0193 18.9432 17.1816 18.8202 17.4024C18.6973 17.6231 18.6655 17.8843 18.7318 18.1288C18.798 18.3733 18.957 18.5812 19.174 18.707L19.7821 19.0701C19.9274 19.1404 20.0861 19.1776 20.2471 19.179C20.4165 19.1766 20.5821 19.1282 20.7268 19.0388C20.8715 18.9494 20.99 18.8223 21.0699 18.6707C21.1339 18.5648 21.1755 18.4466 21.1921 18.3235C21.2087 18.2003 21.1999 18.0751 21.1662 17.9556C21.1326 17.8361 21.0749 17.7251 20.9967 17.6294C20.9185 17.5338 20.8216 17.4557 20.7122 17.4001ZM17.6 15.6212L16.348 14.8951C16.2399 14.8324 16.1207 14.792 15.9971 14.7762C15.8736 14.7604 15.7482 14.7695 15.6282 14.803C15.5082 14.8365 15.3958 14.8938 15.2977 14.9715C15.1995 15.0492 15.1174 15.1458 15.0562 15.2558C14.9949 15.3658 14.9557 15.487 14.9407 15.6125C14.9257 15.7379 14.9353 15.8651 14.9689 15.9868C15.0026 16.1084 15.0595 16.2221 15.1366 16.3214C15.2136 16.4206 15.3092 16.5035 15.4179 16.5651L16.6699 17.2912C16.8152 17.3615 16.974 17.3987 17.135 17.4001C17.3043 17.3977 17.47 17.3493 17.6147 17.2599C17.7594 17.1705 17.8778 17.0434 17.9577 16.8918C18.0228 16.7862 18.0653 16.6679 18.0825 16.5445C18.0997 16.4212 18.0911 16.2955 18.0574 16.1757C18.0237 16.0559 17.9655 15.9447 17.8867 15.8491C17.8079 15.7536 17.7103 15.6759 17.6 15.6212ZM7.94155 12.2812L9.19357 13.0073C9.33888 13.0776 9.49761 13.1148 9.6586 13.1162C9.82798 13.1138 9.99363 13.0654 10.1383 12.976C10.283 12.8866 10.4015 12.7595 10.4814 12.6079C10.5435 12.4985 10.5835 12.3777 10.5992 12.2524C10.6148 12.1272 10.6057 12 10.5724 11.8784C10.5391 11.7567 10.4823 11.643 10.4052 11.5439C10.3282 11.4447 10.2325 11.3622 10.1236 11.301L8.87162 10.5749C8.76383 10.5118 8.64476 10.4712 8.52134 10.4553C8.39792 10.4395 8.27262 10.4487 8.15275 10.4825C8.03288 10.5163 7.92084 10.574 7.82317 10.6521C7.72549 10.7303 7.64413 10.8275 7.58383 10.9379C7.46399 11.166 7.43428 11.4319 7.50073 11.6814C7.56719 11.9309 7.72481 12.1454 7.94155 12.2812ZM6.40335 9.19531L5.79522 8.83227C5.68714 8.76957 5.56791 8.72915 5.44439 8.71335C5.32087 8.69755 5.19549 8.70667 5.07546 8.7402C4.95542 8.77372 4.8431 8.83098 4.74493 8.90869C4.64676 8.9864 4.56469 9.08303 4.50343 9.19302C4.44217 9.30302 4.40293 9.42421 4.38796 9.54965C4.37299 9.67508 4.38259 9.80228 4.4162 9.92394C4.44981 10.0456 4.50677 10.1593 4.58382 10.2586C4.66087 10.3578 4.75647 10.4406 4.86515 10.5023L5.47328 10.8653C5.61859 10.9357 5.77732 10.9728 5.93831 10.9742C6.10769 10.9718 6.27334 10.9234 6.41804 10.834C6.56273 10.7447 6.68118 10.6176 6.76107 10.466C6.82193 10.3592 6.861 10.2411 6.87592 10.1187C6.89085 9.99635 6.88134 9.87216 6.84796 9.75358C6.81457 9.635 6.758 9.52446 6.68161 9.42854C6.60523 9.33263 6.51059 9.25331 6.40335 9.19531Z' fill='%2320133A'/><defs><linearGradient id='paint0_linear_714_179' x1='7.13608e-05' y1='14.001' x2='25.1156' y2='14.001' gradientUnits='userSpaceOnUse'><stop stop-color='%239059FF'/><stop offset='1' stop-color='%23F770FF'/></linearGradient></defs></svg>&quot;); background-repeat: repeat, no-repeat; background-position: 0% 0%, right calc(50% + 0px); background-origin: padding-box, content-box;">
                                        <button class="btn btn-block form-field" type="submit"><span>Subscribe</span>
                                        </button>
                                        <button type="button"
                                                style="border: 0px; clip: rect(0px, 0px, 0px, 0px); clip-path: inset(50%); height: 1px; margin: 0px -1px -1px 0px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap;">
                                            Создать новый псевдоним
                                        </button>
                                    </div>
                                    <div class="message-container">
                                        <div class="notification success form-notification sidebar-notification">
                                            <a class="notification-close" href="javascript:;"
                                               aria-label="close notification"><span class="close-icon"><svg><use
                                                            xlink:href="#i-close"></use></svg></span></a>
                                            <strong>Great!</strong> Check your inbox and click the link to confirm your
                                            subscription.
                                        </div>
                                        <div class="notification error form-notification sidebar-notification">
                                            <a class="notification-close" href="javascript:;"
                                               aria-label="close notification"><span class="close-icon"><svg><use
                                                            xlink:href="#i-close"></use></svg></span></a>
                                            <strong>Error!</strong> Please enter a valid email address!
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="h4 widget-title">Follow us</h3>
                            <div class="widget-content">
                                <div class="social-links flex">
                                    <a href="https://twitter.com/gbjsolution" class="twitter" aria-label="twitter link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.2048 2.25H21.5128L14.2858 10.51L22.7878 21.75H16.1308L10.9168 14.933L4.95084 21.75H1.64084L9.37084 12.915L1.21484 2.25H8.04084L12.7538 8.481L18.2048 2.25ZM17.0438 19.77H18.8768L7.04484 4.126H5.07784L17.0438 19.77Z"></path>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/gbjsolution" class="facebook"
                                       aria-label="facebook link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="linkedin" aria-label="linkedin link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="instagram" aria-label="instagram link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="github" aria-label="github link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 2C6.475 2 2 6.475 2 12a9.994 9.994 0 0 0 6.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.288-.6-1.175-1.025-1.413-.35-.187-.85-.65-.013-.662.788-.013 1.35.725 1.538 1.025.9 1.512 2.338 1.087 2.912.825.088-.65.35-1.087.638-1.337-2.225-.25-4.55-1.113-4.55-4.938 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.275.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 0 1 2.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.016 10.016 0 0 0 22 12c0-5.525-4.475-10-10-10z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="resize-sensor"
                             style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                            <div class="resize-sensor-expand"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                                <div
                                    style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                            </div>
                            <div class="resize-sensor-shrink"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                                <div
                                    style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resize-sensor"
                 style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                <div class="resize-sensor-expand"
                     style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                    <div
                        style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                </div>
                <div class="resize-sensor-shrink"
                     style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden; opacity: 0;">
                    <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget-newsletter">
                        <h3 class="h4 widget-title">Newsletter</h3>
                        <div class="widget-content">
                            <div class="text-copy">
                                Get the latest posts delivered straight to your inbox.
                            </div>
                            <form data-members-form="subscribe">
                                <div class="form-field-wrap field-group-inline">
                                    <label for="email" class="sr-only">Email</label>
                                    <input data-members-email="" type="email" class="email form-field input-field"
                                           id="email" placeholder="Your email address" required="" autocomplete="off"
                                           style="background-size: auto, 25px; background-image: none, url(&quot;data:image/svg+xml;utf8,<svg width='26' height='28' viewBox='0 0 26 28' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M23.8958 6.1084L13.7365 0.299712C13.3797 0.103027 12.98 0 12.5739 0C12.1678 0 11.7682 0.103027 11.4113 0.299712L1.21632 6.1084C0.848276 6.31893 0.54181 6.62473 0.328154 6.99462C0.114498 7.36452 0.00129162 7.78529 7.13608e-05 8.21405V19.7951C-0.00323007 20.2248 0.108078 20.6474 0.322199 21.0181C0.53632 21.3888 0.845275 21.6938 1.21632 21.9008L11.3756 27.6732C11.7318 27.8907 12.1404 28.0037 12.556 27.9999C12.9711 27.9989 13.3784 27.8861 13.7365 27.6732L23.8958 21.9008C24.2638 21.6903 24.5703 21.3845 24.7839 21.0146C24.9976 20.6447 25.1108 20.2239 25.112 19.7951V8.21405C25.1225 7.78296 25.0142 7.35746 24.7994 6.98545C24.5845 6.61343 24.2715 6.30969 23.8958 6.1084Z' fill='url(%23paint0_linear_714_179)'/><path d='M5.47328 17.037L4.86515 17.4001C4.75634 17.4613 4.66062 17.5439 4.58357 17.643C4.50652 17.7421 4.4497 17.8558 4.4164 17.9775C4.3831 18.0991 4.374 18.2263 4.38963 18.3516C4.40526 18.4768 4.44531 18.5977 4.50743 18.707C4.58732 18.8586 4.70577 18.9857 4.85046 19.0751C4.99516 19.1645 5.16081 19.2129 5.33019 19.2153C5.49118 19.2139 5.64992 19.1767 5.79522 19.1064L6.40335 18.7434C6.51216 18.6822 6.60789 18.5996 6.68493 18.5004C6.76198 18.4013 6.8188 18.2876 6.8521 18.166C6.8854 18.0443 6.8945 17.9171 6.87887 17.7919C6.86324 17.6666 6.82319 17.5458 6.76107 17.4364C6.70583 17.3211 6.62775 17.2185 6.53171 17.1352C6.43567 17.0518 6.32374 16.9895 6.20289 16.952C6.08205 16.9145 5.95489 16.9027 5.82935 16.9174C5.70382 16.932 5.5826 16.9727 5.47328 17.037ZM9.19357 14.8951L7.94155 15.6212C7.83273 15.6824 7.73701 15.7649 7.65996 15.8641C7.58292 15.9632 7.52609 16.0769 7.49279 16.1986C7.4595 16.3202 7.4504 16.4474 7.46603 16.5726C7.48166 16.6979 7.5217 16.8187 7.58383 16.9281C7.66371 17.0797 7.78216 17.2068 7.92686 17.2962C8.07155 17.3856 8.23721 17.434 8.40658 17.4364C8.56757 17.435 8.72631 17.3978 8.87162 17.3275L10.1236 16.6014C10.2325 16.5402 10.3282 16.4576 10.4052 16.3585C10.4823 16.2594 10.5391 16.1457 10.5724 16.024C10.6057 15.9024 10.6148 15.7752 10.5992 15.6499C10.5835 15.5247 10.5435 15.4038 10.4814 15.2944C10.4261 15.1791 10.348 15.0766 10.252 14.9932C10.156 14.9099 10.044 14.8475 9.92318 14.8101C9.80234 14.7726 9.67518 14.7608 9.54964 14.7754C9.42411 14.7901 9.30289 14.8308 9.19357 14.8951ZM14.2374 13.1198C14.187 13.0168 14.1167 12.9251 14.0307 12.8503C13.9446 12.7754 13.8446 12.7189 13.7366 12.6842V5.38336C13.7371 5.2545 13.7124 5.12682 13.6641 5.00768C13.6157 4.88854 13.5446 4.78029 13.4548 4.68917C13.365 4.59806 13.2583 4.52587 13.1409 4.47678C13.0235 4.42769 12.8977 4.40266 12.7708 4.40314C12.6457 4.40355 12.522 4.42946 12.407 4.47933C12.292 4.52919 12.188 4.602 12.1013 4.69343C12.0145 4.78485 11.9467 4.89304 11.902 5.01156C11.8572 5.13007 11.8364 5.25651 11.8407 5.38336V12.7168C11.7327 12.7516 11.6327 12.8081 11.5466 12.883C11.4606 12.9578 11.3903 13.0495 11.3399 13.1525C11.2727 13.2801 11.2346 13.4213 11.2284 13.5659C11.2222 13.7104 11.2481 13.8545 11.3041 13.9875C11.2481 14.1205 11.2222 14.2646 11.2284 14.4091C11.2346 14.5536 11.2727 14.6949 11.3399 14.8225C11.3903 14.9255 11.4606 15.0172 11.5466 15.092C11.6327 15.1669 11.7327 15.2233 11.8407 15.2581V22.5916C11.8407 22.8516 11.9425 23.1009 12.1236 23.2847C12.3047 23.4686 12.5504 23.5718 12.8065 23.5718C13.0627 23.5718 13.3084 23.4686 13.4895 23.2847C13.6706 23.1009 13.7724 22.8516 13.7724 22.5916V15.2218C13.8804 15.187 13.9804 15.1305 14.0664 15.0557C14.1525 14.9809 14.2228 14.8892 14.2732 14.7862C14.3404 14.6586 14.3785 14.5173 14.3847 14.3728C14.3909 14.2283 14.365 14.0842 14.309 13.9512C14.3917 13.6751 14.3661 13.3772 14.2374 13.1198ZM16.6735 10.6112L15.4215 11.3373C15.3127 11.3985 15.2169 11.481 15.1399 11.5802C15.0628 11.6793 15.006 11.793 14.9727 11.9147C14.9394 12.0363 14.9303 12.1635 14.946 12.2887C14.9616 12.414 15.0016 12.5348 15.0638 12.6442C15.1436 12.7958 15.2621 12.9229 15.4068 13.0123C15.5515 13.1017 15.7171 13.1501 15.8865 13.1525C16.0475 13.1511 16.2062 13.1139 16.3515 13.0436L17.6036 12.3175C17.7124 12.2563 17.8081 12.1737 17.8851 12.0746C17.9622 11.9755 18.019 11.8617 18.0523 11.7401C18.0856 11.6184 18.0947 11.4913 18.0791 11.366C18.0635 11.2408 18.0234 11.1199 17.9613 11.0105C17.906 10.8952 17.828 10.7927 17.7319 10.7093C17.6359 10.626 17.524 10.5636 17.4031 10.5261C17.2823 10.4887 17.1551 10.4769 17.0296 10.4915C16.904 10.5061 16.7828 10.5469 16.6735 10.6112ZM19.639 10.9742C19.8 10.9728 19.9587 10.9357 20.104 10.8653L20.7122 10.5023C20.8208 10.4406 20.9164 10.3578 20.9935 10.2586C21.0705 10.1593 21.1275 10.0456 21.1611 9.92394C21.1947 9.80228 21.2043 9.67508 21.1893 9.54965C21.1744 9.42421 21.1351 9.30302 21.0739 9.19302C21.0126 9.08303 20.9305 8.9864 20.8324 8.90869C20.7342 8.83098 20.6219 8.77372 20.5019 8.7402C20.3818 8.70667 20.2564 8.69755 20.1329 8.71335C20.0094 8.72915 19.8902 8.76957 19.7821 8.83227L19.174 9.19531C19.0651 9.25651 18.9694 9.33909 18.8924 9.43822C18.8153 9.53735 18.7585 9.65106 18.7252 9.77271C18.6919 9.89436 18.6828 10.0215 18.6984 10.1468C18.7141 10.272 18.7541 10.3929 18.8162 10.5023C18.8981 10.6494 19.018 10.7711 19.163 10.8543C19.308 10.9374 19.4725 10.9789 19.639 10.9742ZM20.7122 17.4001L20.104 17.037C19.8859 16.9133 19.6284 16.8823 19.3878 16.9508C19.1472 17.0193 18.9432 17.1816 18.8202 17.4024C18.6973 17.6231 18.6655 17.8843 18.7318 18.1288C18.798 18.3733 18.957 18.5812 19.174 18.707L19.7821 19.0701C19.9274 19.1404 20.0861 19.1776 20.2471 19.179C20.4165 19.1766 20.5821 19.1282 20.7268 19.0388C20.8715 18.9494 20.99 18.8223 21.0699 18.6707C21.1339 18.5648 21.1755 18.4466 21.1921 18.3235C21.2087 18.2003 21.1999 18.0751 21.1662 17.9556C21.1326 17.8361 21.0749 17.7251 20.9967 17.6294C20.9185 17.5338 20.8216 17.4557 20.7122 17.4001ZM17.6 15.6212L16.348 14.8951C16.2399 14.8324 16.1207 14.792 15.9971 14.7762C15.8736 14.7604 15.7482 14.7695 15.6282 14.803C15.5082 14.8365 15.3958 14.8938 15.2977 14.9715C15.1995 15.0492 15.1174 15.1458 15.0562 15.2558C14.9949 15.3658 14.9557 15.487 14.9407 15.6125C14.9257 15.7379 14.9353 15.8651 14.9689 15.9868C15.0026 16.1084 15.0595 16.2221 15.1366 16.3214C15.2136 16.4206 15.3092 16.5035 15.4179 16.5651L16.6699 17.2912C16.8152 17.3615 16.974 17.3987 17.135 17.4001C17.3043 17.3977 17.47 17.3493 17.6147 17.2599C17.7594 17.1705 17.8778 17.0434 17.9577 16.8918C18.0228 16.7862 18.0653 16.6679 18.0825 16.5445C18.0997 16.4212 18.0911 16.2955 18.0574 16.1757C18.0237 16.0559 17.9655 15.9447 17.8867 15.8491C17.8079 15.7536 17.7103 15.6759 17.6 15.6212ZM7.94155 12.2812L9.19357 13.0073C9.33888 13.0776 9.49761 13.1148 9.6586 13.1162C9.82798 13.1138 9.99363 13.0654 10.1383 12.976C10.283 12.8866 10.4015 12.7595 10.4814 12.6079C10.5435 12.4985 10.5835 12.3777 10.5992 12.2524C10.6148 12.1272 10.6057 12 10.5724 11.8784C10.5391 11.7567 10.4823 11.643 10.4052 11.5439C10.3282 11.4447 10.2325 11.3622 10.1236 11.301L8.87162 10.5749C8.76383 10.5118 8.64476 10.4712 8.52134 10.4553C8.39792 10.4395 8.27262 10.4487 8.15275 10.4825C8.03288 10.5163 7.92084 10.574 7.82317 10.6521C7.72549 10.7303 7.64413 10.8275 7.58383 10.9379C7.46399 11.166 7.43428 11.4319 7.50073 11.6814C7.56719 11.9309 7.72481 12.1454 7.94155 12.2812ZM6.40335 9.19531L5.79522 8.83227C5.68714 8.76957 5.56791 8.72915 5.44439 8.71335C5.32087 8.69755 5.19549 8.70667 5.07546 8.7402C4.95542 8.77372 4.8431 8.83098 4.74493 8.90869C4.64676 8.9864 4.56469 9.08303 4.50343 9.19302C4.44217 9.30302 4.40293 9.42421 4.38796 9.54965C4.37299 9.67508 4.38259 9.80228 4.4162 9.92394C4.44981 10.0456 4.50677 10.1593 4.58382 10.2586C4.66087 10.3578 4.75647 10.4406 4.86515 10.5023L5.47328 10.8653C5.61859 10.9357 5.77732 10.9728 5.93831 10.9742C6.10769 10.9718 6.27334 10.9234 6.41804 10.834C6.56273 10.7447 6.68118 10.6176 6.76107 10.466C6.82193 10.3592 6.861 10.2411 6.87592 10.1187C6.89085 9.99635 6.88134 9.87216 6.84796 9.75358C6.81457 9.635 6.758 9.52446 6.68161 9.42854C6.60523 9.33263 6.51059 9.25331 6.40335 9.19531Z' fill='%2320133A'/><defs><linearGradient id='paint0_linear_714_179' x1='7.13608e-05' y1='14.001' x2='25.1156' y2='14.001' gradientUnits='userSpaceOnUse'><stop stop-color='%239059FF'/><stop offset='1' stop-color='%23F770FF'/></linearGradient></defs></svg>&quot;); background-repeat: repeat, no-repeat; background-position: 0% 0%, right calc(50% + 0px); background-origin: padding-box, content-box;">
                                    <button class="btn form-field" type="submit"><span>Subscribe</span></button>
                                    <button type="button"
                                            style="border: 0px; clip: rect(0px, 0px, 0px, 0px); clip-path: inset(50%); height: 1px; margin: 0px -1px -1px 0px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap;">
                                        Создать новый псевдоним
                                    </button>
                                </div>
                                <div class="message-container">
                                    <div class="notification success form-notification">
                                        <a class="notification-close" href="javascript:;"
                                           aria-label="close notification"><span class="close-icon"><svg><use
                                                        xlink:href="#i-close"></use></svg></span></a>
                                        <strong>Great!</strong> Check your inbox and click the link to confirm your
                                        subscription.
                                    </div>
                                    <div class="notification error form-notification">
                                        <a class="notification-close" href="javascript:;"
                                           aria-label="close notification"><span class="close-icon"><svg><use
                                                        xlink:href="#i-close"></use></svg></span></a>
                                        <strong>Error!</strong> Please enter a valid email address!
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="h4 widget-title">Follow us</h3>
                        <div class="widget-content">
                            <div class="social-links flex">
                                <a href="https://twitter.com/gbjsolution" class="twitter" aria-label="twitter link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M18.2048 2.25H21.5128L14.2858 10.51L22.7878 21.75H16.1308L10.9168 14.933L4.95084 21.75H1.64084L9.37084 12.915L1.21484 2.25H8.04084L12.7538 8.481L18.2048 2.25ZM17.0438 19.77H18.8768L7.04484 4.126H5.07784L17.0438 19.77Z"></path>
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/gbjsolution" class="facebook"
                                   aria-label="facebook link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="linkedin" aria-label="linkedin link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="instagram" aria-label="instagram link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="github" aria-label="github link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 2C6.475 2 2 6.475 2 12a9.994 9.994 0 0 0 6.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.288-.6-1.175-1.025-1.413-.35-.187-.85-.65-.013-.662.788-.013 1.35.725 1.538 1.025.9 1.512 2.338 1.087 2.912.825.088-.65.35-1.087.638-1.337-2.225-.25-4.55-1.113-4.55-4.938 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.275.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 0 1 2.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.016 10.016 0 0 0 22 12c0-5.525-4.475-10-10-10z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget-posts">
                        <h3 class="h4 widget-title">Latest posts</h3>
                        <div class="widget-content">
                            <article class="post-small flex">
                                <div class="post-img-container">
                                    <a href="/autumn-is-a-second-spring-when-every-leaf-is-a-flower/"
                                       class="post-img-wrap">
                                        <img
                                            src="https://images.unsplash.com/photo-1665686440627-936e9700a100?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wxfDF8YWxsfDF8fHx8fHwyfHwxNjcxMjc4Mjc5&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                            alt="Autumn is a second spring when every leaf is a flower" loading="lazy">
                                    </a>
                                </div>
                                <div class="post-info-wrap">
                                    <h3 class="post-title h5">
                                        <a href="/autumn-is-a-second-spring-when-every-leaf-is-a-flower/">Autumn is a
                                            second spring when every leaf is a flower</a>
                                    </h3>
                                    <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>4 min read
                    </span>
                                    </div>
                                </div>
                            </article>
                            <article class="post-small flex">
                                <div class="post-img-container">
                                    <a href="/never-let-your-memories-be-greater-than-your-dreams/"
                                       class="post-img-wrap">
                                        <img
                                            src="https://images.unsplash.com/photo-1513436539083-9d2127e742f1?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxkcmVhbXxlbnwwfHx8fDE2NzE0MzA3MTU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                            alt="Never let your memories be greater than your dreams" loading="lazy">
                                    </a>
                                </div>
                                <div class="post-info-wrap">
                                    <h3 class="post-title h5">
                                        <a href="/never-let-your-memories-be-greater-than-your-dreams/">Never let your
                                            memories be greater than your dreams</a>
                                    </h3>
                                    <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>3 min read
                    </span>
                                    </div>
                                </div>
                            </article>
                            <article class="post-small flex">
                                <div class="post-img-container">
                                    <a href="/dramatically-improve-your-cooking-using-just-your-imagination/"
                                       class="post-img-wrap">
                                        <img
                                            src="https://images.unsplash.com/photo-1619735007512-34004ec2f348?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDMyfHxpbWFnaW5hdGlvbnxlbnwwfHx8fDE2NzE0MzA4NDI&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150"
                                            alt="Dramatically improve your cooking using just your imagination"
                                            loading="lazy">
                                    </a>
                                </div>
                                <div class="post-info-wrap">
                                    <h3 class="post-title h5">
                                        <a href="/dramatically-improve-your-cooking-using-just-your-imagination/">Dramatically
                                            improve your cooking using just your imagination</a>
                                    </h3>
                                    <div class="post-meta text-s">
                    <span class="read-time">
                        <svg><use xlink:href="#i-clock"></use></svg>4 min read
                    </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget-tags">
                        <h3 class="h4 widget-title">Tags</h3>
                        <div class="widget-content">
                            <div class="tag-list">
                                <a href="/tag/food/"><span class="tag-accent"
                                                           style="background: #B43ADF;"></span>Food</a>
                                <a href="/tag/health/"><span class="tag-accent" style="background: #1dbf2f;"></span>Health</a>
                                <a href="/tag/inspiration/"><span class="tag-accent"
                                                                  style="background: #04baf6;"></span>Inspiration</a>
                                <a href="/tag/lifestyle/"><span class="tag-accent" style="background: #4d61ff;"></span>Lifestyle</a>
                                <a href="/tag/nature/"><span class="tag-accent" style="background: #fd94ff;"></span>Nature</a>
                                <a href="/tag/technology/"><span class="tag-accent" style="background: #f18509;"></span>Technology</a>
                                <a href="/tag/travel/"><span class="tag-accent" style="background: #E10689;"></span>Travel</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-posts">
                        <div class="widget-content">
                            <ul class="secondary-nav-wrap no-style-list flex" role="menu">
                                <li class="nav-item" role="menuitem">
                                    <a href="/privacy/" class="nav-link">Privacy policy</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/terms/" class="nav-link">Terms and conditions</a>
                                </li>
                                <li class="nav-item" role="menuitem">
                                    <a href="/contact/" class="nav-link">Contact</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container flex justify-space-between footer-bottom">
            <div class="copyright">
                <div class="copyright">
                    2023
                </div>
            </div>
            <div class="back-to-top">
                <button class="btn-link js-scroll-top">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
                    </svg>
                    Back to top
                </button>
            </div>
        </div>
    </footer>
</div>

</body>


@vite(['resources/assets/client/js/app.js'])

</html>
