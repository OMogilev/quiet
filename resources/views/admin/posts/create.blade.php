@extends('admin.layout.layout')

@section('title', 'Добавить запись')


@section('scripts')
    <script src="https://cdn.tiny.cloud/1/da9r0wlvv75hl7qi953wc5e3q82w69fr5zhu5pcbjv6hqzwn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @vite('resources/assets/admin/js/posts.js')
    @vite('resources/assets/admin/js/seo.js')
@endsection

@section('content')

    <form class="mainForm" method="post" action="{{ route('admin.posts.store') }}">
        @csrf

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Добавить запись
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button type="button" class="btn box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0 getPreview"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4 h-4 mr-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Превью </button>
                <div class="dropdown">
                    <button class="dropdown-toggle btn btn-primary saveBtn save mr-5" aria-expanded="false"> Сохранить </button>
                    <button class="dropdown-toggle btn btn-success saveBtn publish" aria-expanded="false"> Опубликовать </button>
                    <button class="dropdown-toggle btn btn-warning hidden saveBtn toPlan" aria-expanded="false"> Запланировать </button>
                </div>
            </div>
        </div>

        @include('admin.components.errors')

        <input type="hidden" name="post_id" value="0">
        <input type="hidden" name="preview_id" value="0">

        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <input type="text" class="intro-y form-control py-3 px-4 box pr-10 placeholder-theme-13 slugGenerate" data-type="posts" name="title" value="{{ old('title') }}"
                       placeholder="Заголовок">

                <div class="mt-3">
                    <div class="input-group">
                        <div id="input-group-email" class="input-group-text slugPrefix">/</div>
                        <input id="url" name="slug" type="text" class="form-control w-full" placeholder="Url" value="{{ old('slug') }}">
                    </div>
                    <p class="text-theme-6 hidden slug_unique_error">Такой урл уже есть в базе</p>
                </div>

                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav nav-tabs flex-col sm:flex-row bg-gray-300 text-gray-600"
                         role="tablist">
                        <a data-toggle="tab" data-target="#content" href="#"
                           class="w-full sm:w-40 py-4 text-center flex justify-center items-center active"
                           id="content-tab" role="tab" aria-controls="content" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file-text w-4 h-4 mr-2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            Контент </a>
                    </div>
                    <div class="post__content tab-content">
                        <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">

                            <div class="mt-6 editor_wrapper" page-type="post">
                                @include('admin.editor.tinymce')
                            </div>

                            @include('admin.seo.partials.seo_block')

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div class="statusBlock mt-3">
                        <p>Опубликовать: <span class="font-bold">сейчас</span> <a href="#" class="changeLink dateTimeToggleBtn ml-3">Изменить</a></p>
                    </div>

                    <div class="mt-3 dateTimeChooseBlock justify-center hidden">
                        <div class="date flex justify-center items-center">
{{--                            <input type="text" class="form-control text-center mr-2 w-12 f-day" value="{{ $today->format('d') }}">--}}

{{--                            <select class="form-control mr-2 text-center f-month">--}}
{{--                                <option {{ $today->format('m') == '01' ? 'selected' : '' }} value="01" data-text="Янв">01-Янв</option>--}}
{{--                                <option {{ $today->format('m') == '02' ? 'selected' : '' }} value="02" data-text="Фев">02-Фев</option>--}}
{{--                                <option {{ $today->format('m') == '03' ? 'selected' : '' }} value="03" data-text="Мар">03-Мар</option>--}}
{{--                                <option {{ $today->format('m') == '04' ? 'selected' : '' }} value="04" data-text="Апр">04-Апр</option>--}}
{{--                                <option {{ $today->format('m') == '05' ? 'selected' : '' }} value="05" data-text="Май">05-Май</option>--}}
{{--                                <option {{ $today->format('m') == '06' ? 'selected' : '' }} value="06" data-text="Июн">06-Июн</option>--}}
{{--                                <option {{ $today->format('m') == '07' ? 'selected' : '' }} value="07" data-text="Июл">07-Июл</option>--}}
{{--                                <option {{ $today->format('m') == '08' ? 'selected' : '' }} value="08" data-text="Авг">08-Авг</option>--}}
{{--                                <option {{ $today->format('m') == '09' ? 'selected' : '' }} value="09" data-text="Сен">09-Сен</option>--}}
{{--                                <option {{ $today->format('m') == '10' ? 'selected' : '' }} value="10" data-text="Окт">10-Окт</option>--}}
{{--                                <option {{ $today->format('m') == '11' ? 'selected' : '' }} value="11" data-text="Ноя">11-Ноя</option>--}}
{{--                                <option {{ $today->format('m') == '12' ? 'selected' : '' }} value="12" data-text="Дек">12-Дек</option>--}}
{{--                            </select>--}}

{{--                            <input type="text" class="form-control text-center mr-5 w-16 f-year" value="{{ $today->format('Y') }}">--}}

{{--                            <input type="text" class="form-control text-center mr-2 w-12 f-hour" value="{{ $today->format('H') }}">--}}
{{--                            <span class="mr-2">:</span>--}}
{{--                            <input type="text" class="form-control text-center w-12 f-minute" value="{{ $today->format('i') }}">--}}
{{--                        </div>--}}

{{--                        <input type="hidden" name="date" value="{{ $today->format('Y-m-d H:i:s') }}">--}}

                        <div class="mt-3">
                            <a href="#" class="btn btn-primary btn-sm inline-block dateTimeBlock-OKBtn">Ок</a>
                            <a href="#" class="btn btn-secondary btn-sm inline-block ml-3 dateTimeBlock-cancelBtn">Отмена</a>
                        </div>


                    </div>
                    <div class="mt-3">
                        @php
                            $oldCats = old('categories', []);
                        @endphp

                        <label for="categories" class="form-label">Категория</label>
                        <select data-placeholder="Выберите категории" class="tail-select w-full" id="categories" name="categories[]"
                                multiple="" data-select-hidden="0" data-search="true">
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $oldCats) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        <div class="mt-3">
                            @php
                                $oldTags = old('tags', []);
                            @endphp
                            <label for="tags" class="form-label">Теги</label>
                            <select data-placeholder="Выберите метки" class="tail-select w-full" id="tags" name="tags[]"
                                    multiple="" data-select-hidden="0" data-search="true">
                                @forelse($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $oldTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mt-3">
                        Миниатюра
                    </div>
                    <div class="mt-5">
                        <div class="image-fit w-48 h-48 m-auto cursor-pointer ">
                            <img class="imageChooser rounded-md" data-target="thumbnail_id" src="{{ asset('admin/images/no-image.png') }}" data-noimg="{{ asset('admin/images/no-image.png') }}">
                            <div class="w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 hidden deleteThumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                        </div>
                        <input type="hidden" name="thumbnail_id">
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
