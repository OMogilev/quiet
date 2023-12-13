@extends('admin.layout.layout')

@section('title', 'Записи')

@section('scripts')
    @vite('resources/assets/admin/js/posts.js')
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Записи
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary shadow-md mr-2">Добавить новую</a>

            <div class="hidden md:block mx-auto totalPosts">Всего записей: <span>{{ number_format($posts->total(), 0, ',', ' ') }}</span></div>
            @include('admin.components.search', ['table' => 'posts', 'type' => 'post'])
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-image block">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </th>
                    <th class="whitespace-nowrap">Заголовок</th>
                    <th class="whitespace-nowrap">Категории</th>
                    <th class="whitespace-nowrap">Метки</th>
                    <th class="whitespace-nowrap">Статус</th>
                    <th class="whitespace-nowrap text-center">Дата</th>
                    <th class="whitespace-nowrap">Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr class="intro-x">
                        <td class="w-32">
                            <div class="flex">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="{{ !empty($post->thumbnail) ? $post->thumbnail->alt : '' }}"
                                         class="rounded-full"
                                         src="{{ !empty($post->thumbnail) ? asset($post->thumbnail->path) : asset('admin/images/no-image.png') }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                               class="font-medium">{{ $post->title }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5"><a
                                    href="{{ route('admin.users.edit', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a>
                            </div>
                        </td>
                        <td>
                            @forelse($post->categories as $category)
                                <div>
                                    <a href="{{ route('admin.categories.edit', ['category' => $category]) }}">{{ $category->name }}</a>
                                </div>
                            @empty
                            @endforelse
                        </td>
                        <td>
                            @forelse($post->tags as $tag)
                                <div>
                                    <a class="text-xs" href="{{ route('admin.tags.edit', ['tag' => $tag]) }}">{{ $tag->name }}</a>
                                </div>
                            @empty
                            @endforelse
                        </td>
                        <td class="w-40">
                            @if($post->status == 'published')
                                <div class="flex items-center justify-center text-theme-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Опубликовано
                                </div>
                            @elseif($post->status == 'future')
                                <div class="flex items-center justify-center text-theme-9" style="color: orange;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle w-4 h-4 mr-2" style="" stroke="currentColor"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    Запланировано
                                </div>
                            @else
                                <div class="flex items-center justify-center text-theme-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Черновик
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $post->updated_at->format('d-m-Y H:i:s') }}
                        </td>
                        <td class="table-report__action">
                            <div>
                                @if( $post->status != 'draft' )
                                    <a class="flex items-center mr-3" target="_blank"
                                       href="{{ route('client.link',
                                                $post->categories->first()->parent ? ['first' => $post->categories->first()->parent->slug, 'second' => $post->categories->first()->slug, 'post' => $post->slug] : ['first' => $post->categories->first()->slug, 'second' => $post->slug]
                                            ) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-eye w-4 h-4 mr-1">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        Просмотр
                                    </a>
                                @endif
                                <a class="flex items-center mr-3"
                                   href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Изменить </a>
                                <a class="flex items-center text-theme-6 deletePost" href="#"
                                   data-id="{{ $post->id }}" data-page="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                    Удалить </a>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

        {{ $posts->links('admin.components.pagination') }}

    </div>



@endsection
