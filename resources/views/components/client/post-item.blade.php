<article class="post-card flex js-post-card">
    <div class="post-img-container">
        <a href="#" class="post-img-wrap">
            <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>
    <div class="post-info-wrap">
        <div class="tag-list">
            @foreach($post->categories as $category)
                <a href="#">
                    <span class="tag-accent" style="background: yellow;"></span>
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
        <h2 class="post-title">
            <a href="{{ route('index', $post->slug) }}">{{ $post->title }}</a>
        </h2>
        <div class="post-excerpt">
            {{ $post->announce() }}
        </div>
        <div class="post-meta text-s">
            <time class="post-date" datetime="{{ $post->published_at->format('Y-m-d') }}">
                <svg>
                    <use xlink:href="#i-calendar"></use>
                </svg>
                {{ $post->getRusDate() }}
            </time>
            <span class="read-time">
                    <svg><use xlink:href="#i-clock"></use></svg>4 min read
                </span>
            <span class="author_name">{{ $post->user->name }}</span>
        </div>
    </div>
</article>
