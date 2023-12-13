<x-app-layout>
    <article class="single-post-card">
        <figure class="single-post-img-container ratio-16-9">
            <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}">
            <figcaption>Photo by <a href="https://unsplash.com/@microsoft365?utm_source=ghost&amp;utm_medium=referral&amp;utm_campaign=api-credit">Microsoft 365</a> / <a href="https://unsplash.com/?utm_source=ghost&amp;utm_medium=referral&amp;utm_campaign=api-credit">Unsplash</a></figcaption>
        </figure>
        <header class="single-post-header">
            <div class="tag-list">
                <a href="/tag/nature/"><span class="tag-accent" style="background: #fd94ff;"></span>Nature</a>
            </div>
            <h1 class="post-title">
                {{ $post->title }}
            </h1>
            <div class="post-meta text-s">
                        <span class="post-author">
                            <svg><use xlink:href="#i-user"></use></svg>
                            <a href="#">{{ $post->user->name }}</a>
                        </span>
                <time class="post-date" datetime="2022-05-02">
                    <svg><use xlink:href="#i-calendar"></use></svg>{{ $post->getRusDate() }}
                </time>
                <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>4 min read
                        </span>
            </div>
        </header>
        <div class="single-post-content">
            {{ $post->text }}
        </div>
    </article>
    <div class="share-wrap">
        <div class="share-title h4 text-center">Share this article:</div>
        <div class="share-links flex justify-center">
            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Share on Facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg></a>
            <a class="twitter" href="https://twitter.com/share?text=Autumn%20is%20a%20second%20spring%20when%20every%20leaf%20is%20a%20flower&amp;url=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/" onclick="window.open(this.href, 'twitter-share', 'width=580,height=296');return false;" title="Share on Twitter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.2048 2.25H21.5128L14.2858 10.51L22.7878 21.75H16.1308L10.9168 14.933L4.95084 21.75H1.64084L9.37084 12.915L1.21484 2.25H8.04084L12.7538 8.481L18.2048 2.25ZM17.0438 19.77H18.8768L7.04484 4.126H5.07784L17.0438 19.77Z"></path></svg></a>
            <a class="pinterest" href="http://pinterest.com/pin/create/button/?url=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/&amp;media=https://images.unsplash.com/photo-1665686440627-936e9700a100?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wxfDF8YWxsfDF8fHx8fHwyfHwxNjcxMjc4Mjc5&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=2000&amp;description=Autumn%20is%20a%20second%20spring%20when%20every%20leaf%20is%20a%20flower" onclick="window.open(this.href, 'linkedin-share', 'width=580,height=296');return false;" title="Share on Pinterest"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.37 2.094A10.003 10.003 0 0 0 8.002 21.17a7.757 7.757 0 0 1 .163-2.293c.185-.839 1.296-5.463 1.296-5.463a3.739 3.739 0 0 1-.324-1.577c0-1.485.857-2.593 1.923-2.593a1.334 1.334 0 0 1 1.342 1.508c0 .9-.578 2.262-.88 3.54a1.544 1.544 0 0 0 1.575 1.923c1.898 0 3.17-2.431 3.17-5.301 0-2.2-1.457-3.848-4.143-3.848a4.746 4.746 0 0 0-4.93 4.794 2.96 2.96 0 0 0 .648 1.97.48.48 0 0 1 .162.554c-.046.184-.162.623-.208.784a.354.354 0 0 1-.51.254c-1.384-.554-2.036-2.077-2.036-3.816 0-2.847 2.384-6.255 7.154-6.255 3.796 0 6.32 2.777 6.32 5.747 0 3.909-2.177 6.848-5.394 6.848a2.861 2.861 0 0 1-2.454-1.246s-.578 2.316-.692 2.754a8.026 8.026 0 0 1-1.019 2.131c.923.28 1.882.42 2.846.416a9.988 9.988 0 0 0 9.996-10.003 10.002 10.002 0 0 0-8.635-9.903z"></path></svg></a>
            <a class="whatsapp" href="whatsapp://send?text=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/" data-action="share/whatsapp/share" onclick="window.open(this.href, 'linkedin-share', 'width=580,height=296');return false;" title="Share on Whatsapp"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"></path></svg></a>
            <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/&amp;title=Autumn%20is%20a%20second%20spring%20when%20every%20leaf%20is%20a%20flower" onclick="window.open(this.href, 'linkedin-share', 'width=580,height=296');return false;" title="Share on Linkedin"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"></path></svg></a>
            <a class="mail" href="mailto:?subject=Autumn%20is%20a%20second%20spring%20when%20every%20leaf%20is%20a%20flower&amp;body=https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/" title="Send via email" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm9.06 8.683L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439z"></path></svg></a>
            <a class="link js-copy-link" href="#" onclick="return false;" data-clipboard-text="https://neon.gbjsolution.com/autumn-is-a-second-spring-when-every-leaf-is-a-flower/" title="Copy the permalink" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"></path></svg></a>

        </div>
        <div class=" notification js-notification-copy-link text-center">
            <a class="notification-close" href="javascript:;" aria-label="close notification"><span class="close-icon"><svg><use xlink:href="#i-close"></use></svg></span></a>
            <span>The link has been Copied to clipboard!</span>
        </div>
    </div>            <div class="author-card flex">
        <div class="avatar-wrap">
            <a href="/author/harini/" class="avatar-link">
                <img class="avatar" src="/content/images/size/w150/2022/12/harini.jpg" loading="lazy" alt="Harini Banerjee">
            </a>
        </div>
        <div class="author-info">
            <h2 class="name h4"><a href="/author/harini/">Harini Banerjee</a></h2>
            <div class="author-social">
                <div class="icon-wrap tooltip">
                    <svg><use xlink:href="#i-map-pin"></use></svg>
                    <span class="tooltip-text">Mumbai</span>
                </div>
                <a href="https://twitter.com/gbjsolution" class="icon-wrap twitter" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.2048 2.25H21.5128L14.2858 10.51L22.7878 21.75H16.1308L10.9168 14.933L4.95084 21.75H1.64084L9.37084 12.915L1.21484 2.25H8.04084L12.7538 8.481L18.2048 2.25ZM17.0438 19.77H18.8768L7.04484 4.126H5.07784L17.0438 19.77Z"></path></svg>            </a>
                <a href="https://www.facebook.com/gbjsolution" class="icon-wrap facebook" target="_blank" rel="noopener">
                    <svg><use xlink:href="#i-facebook"></use></svg>
                </a>
                <a href="http://gbjsolution.com/" class="icon-wrap" target="_blanK" rel="noopener">
                    <svg><use xlink:href="#i-link"></use></svg>
                </a>
            </div>
            <div class="bio">
                Harini Banerjee is award winning young blogger and content marketer. She also sings some time. Frequent traveler, cricket fan and technology enthusiast.
            </div>
        </div>
    </div>
    <div class="row prev-next-wrap">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="prev-post">
                <div class="nav-text">Older post</div>
                <article class="post-small flex">
                    <div class="post-img-container">
                        <a href="/never-let-your-memories-be-greater-than-your-dreams/" class="post-img-wrap">
                            <img src="https://images.unsplash.com/photo-1513436539083-9d2127e742f1?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxkcmVhbXxlbnwwfHx8fDE2NzE0MzA3MTU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=150" alt="Never let your memories be greater than your dreams" loading="lazy">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h3 class="post-title h5">
                            <a href="/never-let-your-memories-be-greater-than-your-dreams/">Never let your memories be greater than your dreams</a>
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
    </div>            <div class="related-post-wrap">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title text-center h4">You might also like</h3>
            </div>
            <div class="col-md-4 related-post-card-wrap">
                <article class="related-post-card">
                    <div class="post-img-container">
                        <a href="/bangladesh-has-developed-plastic-alternative-using-jute/" class="post-img-wrap">
                            <img loading="lazy" srcset="https://images.unsplash.com/photo-1559563458-527698bf5295?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxiYWd8ZW58MHx8fHwxNjcxNDMxNDg0&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300 300w,
                                https://images.unsplash.com/photo-1559563458-527698bf5295?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxiYWd8ZW58MHx8fHwxNjcxNDMxNDg0&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=600 600w" sizes="(max-width: 472px) 400px, (max-width: 767px) 600px, (min-width: 768px) 400px, 400px" src="https://images.unsplash.com/photo-1559563458-527698bf5295?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDI5fHxiYWd8ZW58MHx8fHwxNjcxNDMxNDg0&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300" alt="Bangladesh has developed plastic alternative using jute">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h2 class="post-title h5">
                            <a href="/bangladesh-has-developed-plastic-alternative-using-jute/">Bangladesh has developed plastic alternative using jute</a>
                        </h2>
                        <div class="post-meta text-s">
                        <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>3 min read
                        </span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 related-post-card-wrap">
                <article class="related-post-card">
                    <div class="post-img-container">
                        <a href="/in-all-things-of-nature-there-is-something-of-the-marvelous/" class="post-img-wrap">
                            <img loading="lazy" srcset="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDl8fG5hdHVyZXxlbnwwfHx8fDE2NzE0MzE3ODc&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300 300w,
                                https://images.unsplash.com/photo-1441974231531-c6227db76b6e?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDl8fG5hdHVyZXxlbnwwfHx8fDE2NzE0MzE3ODc&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=600 600w" sizes="(max-width: 472px) 400px, (max-width: 767px) 600px, (min-width: 768px) 400px, 400px" src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDl8fG5hdHVyZXxlbnwwfHx8fDE2NzE0MzE3ODc&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300" alt="In all things of nature there is something of the marvelous">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h2 class="post-title h5">
                            <a href="/in-all-things-of-nature-there-is-something-of-the-marvelous/">In all things of nature there is something of the marvelous</a>
                        </h2>
                        <div class="post-meta text-s">
                        <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>3 min read
                        </span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 related-post-card-wrap">
                <article class="related-post-card">
                    <div class="post-img-container">
                        <a href="/new-tech-innovation-for-low-cost-ocean-cleanup/" class="post-img-wrap">
                            <img loading="lazy" srcset="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxvY2VhbnxlbnwwfHx8fDE2NzE0MzIyNzg&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300 300w,
                                https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxvY2VhbnxlbnwwfHx8fDE2NzE0MzIyNzg&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=600 600w" sizes="(max-width: 472px) 400px, (max-width: 767px) 600px, (min-width: 768px) 400px, 400px" src="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxvY2VhbnxlbnwwfHx8fDE2NzE0MzIyNzg&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300" alt="New tech innovation for low cost ocean cleanup">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h2 class="post-title h5">
                            <a href="/new-tech-innovation-for-low-cost-ocean-cleanup/">New tech innovation for low cost ocean cleanup</a>
                        </h2>
                        <div class="post-meta text-s">
                        <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>2 min read
                        </span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 related-post-card-wrap">
                <article class="related-post-card">
                    <div class="post-img-container">
                        <a href="/with-age-comes-wisdom-with-travel-comes-understanding/" class="post-img-wrap">
                            <img loading="lazy" srcset="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE2fHx0cmF2ZWx8ZW58MHx8fHwxNjcxNDMzMTI4&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300 300w,
                                https://images.unsplash.com/photo-1539635278303-d4002c07eae3?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE2fHx0cmF2ZWx8ZW58MHx8fHwxNjcxNDMzMTI4&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=600 600w" sizes="(max-width: 472px) 400px, (max-width: 767px) 600px, (min-width: 768px) 400px, 400px" src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE2fHx0cmF2ZWx8ZW58MHx8fHwxNjcxNDMzMTI4&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300" alt="With age, comes wisdom. With travel, comes understanding">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h2 class="post-title h5">
                            <a href="/with-age-comes-wisdom-with-travel-comes-understanding/">With age, comes wisdom. With travel, comes understanding</a>
                        </h2>
                        <div class="post-meta text-s">
                        <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>3 min read
                        </span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 related-post-card-wrap">
                <article class="related-post-card">
                    <div class="post-img-container">
                        <a href="/my-wish-is-to-stay-always-like-this-living-quietly-in-a-corner-of-nature/" class="post-img-wrap">
                            <img loading="lazy" srcset="https://images.unsplash.com/photo-1536209604112-c4f045f94729?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxmb3Jlc3QlMjBob3VzZXxlbnwwfHx8fDE2NzE0MzQ0MDU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300 300w,
                                https://images.unsplash.com/photo-1536209604112-c4f045f94729?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxmb3Jlc3QlMjBob3VzZXxlbnwwfHx8fDE2NzE0MzQ0MDU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=600 600w" sizes="(max-width: 472px) 400px, (max-width: 767px) 600px, (min-width: 768px) 400px, 400px" src="https://images.unsplash.com/photo-1536209604112-c4f045f94729?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDE5fHxmb3Jlc3QlMjBob3VzZXxlbnwwfHx8fDE2NzE0MzQ0MDU&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=300" alt="My wish is to stay always like this, living quietly in a corner of nature">
                        </a>
                    </div>
                    <div class="post-info-wrap">
                        <h2 class="post-title h5">
                            <a href="/my-wish-is-to-stay-always-like-this-living-quietly-in-a-corner-of-nature/">My wish is to stay always like this, living quietly in a corner of nature</a>
                        </h2>
                        <div class="post-meta text-s">
                        <span class="read-time">
                            <svg><use xlink:href="#i-clock"></use></svg>3 min read
                        </span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="comment-wrap">
        <div class="comment-container">

            <div id="ghost-comments-root"><iframe srcdoc="<!DOCTYPE html>" frameborder="0" style="width: 100%; height: 361px;" title="comments-frame"></iframe><iframe data-frame="admin-auth" src="https://neon.gbjsolution.com/ghost/auth-frame/" style="display: none;" title="auth-frame"></iframe></div><script defer="" src="https://cdn.jsdelivr.net/ghost/comments-ui@~0.13/umd/comments-ui.min.js" data-ghost-comments="https://neon.gbjsolution.com/" data-api="https://neon.gbjsolution.com/ghost/api/content/" data-admin="https://neon.gbjsolution.com/ghost/" data-key="c89a12a5e85bbc31c4e928df8a" data-title="null" data-count="true" data-post-id="64ec6b94552b1f70f5d1e198" data-color-scheme="auto" data-avatar-saturation="60" data-accent-color="#FB2576" data-comments-enabled="all" data-publication="Neon" crossorigin="anonymous"></script>

        </div>
    </div>
</x-app-layout>
