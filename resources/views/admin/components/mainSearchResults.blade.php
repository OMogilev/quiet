@php $lastType = ''; @endphp

<div class="search-result__content">
@forelse($results as $result)

        @if($lastType != $result->type)
            <div class="search-result__content__title">{{ $result->type }}</div>
            @php $lastType = $result->type; @endphp
        @endif

        <div class="mb-5">
            <a href="" class="flex items-center mt-2">
                <div class="w-8 h-8 image-fit">
                    <img alt="{{ $result->title }}" class="rounded-full" src="{{ $result->type == 'Пользователи' ? asset($result->thumbnail_id ? 'photos/' . $result->thumbnail_id : 'admin/images/no-image.png' ) : asset($result->thumbnail ? $result->thumbnail->path : 'admin/images/no-image.png' ) }}">
                </div>
                <div class="ml-3">{{ $result->title }}</div>
                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">{{ $result->date }}</div>
            </a>
        </div>

@empty
    <p>Ничего не найдено</p>
@endforelse
</div>
