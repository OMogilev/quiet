@extends('admin.layout.layout')

@section('title', 'Теги')

@section('scripts')
    <script src="{{ asset('admin/js/category.js') }}"></script>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Теги
    </h2>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary shadow-md mr-2">Добавить тег</a>

        <div class="hidden md:block mx-auto text-gray-600">Всего тегов: {{ $tags->total() }}</div>
{{--        @include('admin.components.search', ['table' => 'tags'])--}}
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        @if( $tags->count() > 0 )
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Название</th>
                    <th class="text-center whitespace-nowrap">Url</th>
                    <th class="text-center whitespace-nowrap">Записи</th>
                    <th class="text-center whitespace-nowrap">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr class="intro-x">
                        <td>
                            <a href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}" class="font-medium whitespace-nowrap">{{ $tag->title }}</a>
                        </td>
                        <td class="text-center">
                            {{ $tag->slug }}
                        </td>
                        <td>0</td>
                        {{--                    <td class="text-center">--}}
                        {{--                        {{ $tag->posts_count }}--}}
                        {{--                    </td>--}}
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Редактировать </a>
                                <a class="flex items-center text-theme-6 deleteCategory" href="#" data-id="{{ $tag->id }}" data-page="true"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Удалить </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else
            <p class="mt-10">К сожалению, тегов пока нет</p>
        @endif
    </div>
    <!-- END: Data List -->


    {{ $tags->links('admin.components.pagination') }}

@endsection
