@extends('admin.layout.layout')

@section('title', 'Добавить категорию')

@section('footer')
    <script src="https://cdn.tiny.cloud/1/da9r0wlvv75hl7qi953wc5e3q82w69fr5zhu5pcbjv6hqzwn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    @vite(['resources/assets/admin/js/category.js'])
@endsection

@section('content')

    <h2 class="intro-y text-lg font-medium mt-10 mb-5">
        Добавить категорию
    </h2>

    @include('admin.components.errors')

    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="intro-y box p-5">
            <div>
                <label for="name" class="form-label">Название</label>
                <input id="name" name="title" type="text" class="form-control w-full slugGenerate" data-type="categories" placeholder="Название">
            </div>
{{--            <div class="mt-5">--}}
{{--                <label class="form-label">Изображение</label>--}}
{{--                <div class="w-40 h-40 mb-5 mr-5 cursor-pointer relative image-fit">--}}
{{--                    <img class="imageChooser rounded-md" data-target="thumbnail_id" src="{{ asset('admin/images/no-image.png') }}" data-noimg="{{ asset('admin/images/no-image.png') }}">--}}
{{--                    <div class="w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 hidden deleteThumbnail">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>--}}
{{--                    </div>--}}
{{--                    <input type="hidden" name="thumbnail_id">--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="mt-6 editor_wrapper">
                @include('admin.editor.tinymce')
            </div>

            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                    Настройки SEO
                </div>
{{--                <div class="mt-5">--}}
{{--                    @include('admin.seo.index')--}}
{{--                </div>--}}
            </div>



            <div class="text-right mt-5">
                <button type="submit" class="btn btn-primary w-24">Сохранить</button>
            </div>
        </div>

    </form>

@endsection
