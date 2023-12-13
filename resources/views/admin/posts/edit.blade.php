@extends('admin.layout.layout')

@section('title', 'Редактировать запись')


@section('scripts')
    <script src="https://cdn.tiny.cloud/1/da9r0wlvv75hl7qi953wc5e3q82w69fr5zhu5pcbjv6hqzwn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ mix('admin/js/posts.js') }}"></script>
    <script src="{{ mix('admin/js/seo.js') }}"></script>
@endsection

@section('content')

    <form class="mainForm" method="post" action="{{ route('admin.posts.update', ['post' => $post->id]) }}">
        @method('PUT')
        @csrf

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Редактировать запись
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @include('admin.components.editPageButtons', ['post' => $post])
        </div>
    </div>

    @include('admin.components.errors')



        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="preview_id" value="0">

        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <input type="text" class="intro-y form-control py-3 px-4 box pr-10 placeholder-theme-13 slugGenerate" data-type="posts" name="title" value="{{ $post->title }}"
                       placeholder="Заголовок">
                <div class="mt-3">

                    <div class="changeSlug">
                        <div>/<span>{{ $post->slug }}</span> @can('changePost', $post) <a href="#" class="changeLink">Изменить</a> @endcan</div>
                    </div>

                    <div class="input-group hiddenInput hidden">
                        <div id="input-group-email" class="input-group-text slugPrefix">/</div>
                        <input id="url" name="slug" type="text" class="form-control w-full" placeholder="Url" value="{{ $post->slug }}">
                        <a class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x block mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </div>
                    <p class="text-theme-6 hidden slug_unique_error">Такой урл уже есть в базе</p>
                </div>
                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav nav-tabs flex-col sm:flex-row bg-gray-300 dark:bg-dark-2 text-gray-600"
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
                                @include('admin.editor.blocks', ['data' => $post])
                            </div>

                            @include('admin.seo.partials.seo_block')

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
            <!-- BEGIN: Post Info -->
            @can('changePost', $post)
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div class="statusBlock mt-3">
                        @if( $post->status == 'published' )
                            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Запись опубликована
                            </div>
                            <p class="mt-5">Опубликовано: <span class="font-bold">{{ $post->date->format('d-m-Y H:i') }}</span> <a href="#" class="changeLink dateTimeToggleBtn ml-3">Изменить</a></p>
                        @endif

                        @if( $post->status == 'future' )
                            <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle w-6 h-6 mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Запланировано
                            </div>
                            <p class="mt-5">Запланировано на: <span class="font-bold">{{ $post->date->format('d-m-Y H:i') }}</span> <a href="#" class="changeLink dateTimeToggleBtn ml-3">Изменить</a></p>
                        @endif

                        @if( $post->status == 'draft' )
                            <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle w-6 h-6 mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Это черновик
                            </div>
                            <p class="mt-5">Опубликовать: <span class="font-bold">сейчас</span> <a href="#" class="changeLink dateTimeToggleBtn ml-3">Изменить</a></p>
                        @endif

                    </div>

                    <div class="mt-3 dateTimeChooseBlock justify-center hidden">
                        <div class="date flex justify-center items-center">
                            <input type="text" class="form-control text-center mr-2 w-12 f-day" value="{{ $post->date->format('d') }}">

                            <select class="form-control mr-2 text-center f-month">
                                <option {{ $post->date->format('m') == '01' ? 'selected' : '' }} value="01" data-text="Янв">01-Янв</option>
                                <option {{ $post->date->format('m') == '02' ? 'selected' : '' }} value="02" data-text="Фев">02-Фев</option>
                                <option {{ $post->date->format('m') == '03' ? 'selected' : '' }} value="03" data-text="Мар">03-Мар</option>
                                <option {{ $post->date->format('m') == '04' ? 'selected' : '' }} value="04" data-text="Апр">04-Апр</option>
                                <option {{ $post->date->format('m') == '05' ? 'selected' : '' }} value="05" data-text="Май">05-Май</option>
                                <option {{ $post->date->format('m') == '06' ? 'selected' : '' }} value="06" data-text="Июн">06-Июн</option>
                                <option {{ $post->date->format('m') == '07' ? 'selected' : '' }} value="07" data-text="Июл">07-Июл</option>
                                <option {{ $post->date->format('m') == '08' ? 'selected' : '' }} value="08" data-text="Авг">08-Авг</option>
                                <option {{ $post->date->format('m') == '09' ? 'selected' : '' }} value="09" data-text="Сен">09-Сен</option>
                                <option {{ $post->date->format('m') == '10' ? 'selected' : '' }} value="10" data-text="Окт">10-Окт</option>
                                <option {{ $post->date->format('m') == '11' ? 'selected' : '' }} value="11" data-text="Ноя">11-Ноя</option>
                                <option {{ $post->date->format('m') == '12' ? 'selected' : '' }} value="12" data-text="Дек">12-Дек</option>
                            </select>

                            <input type="text" class="form-control text-center mr-5 w-16 f-year" value="{{ $post->date->format('Y') }}">

                            <input type="text" class="form-control text-center mr-2 w-12 f-hour" value="{{ $post->date->format('H') }}">
                            <span class="mr-2">:</span>
                            <input type="text" class="form-control text-center w-12 f-minute" value="{{ $post->date->format('i') }}">
                        </div>

                        <input type="hidden" name="date" value="{{ $post->date->format('Y-m-d H:i:s') }}">

                        <div class="mt-3">
                            <a href="#" class="btn btn-primary btn-sm inline-block dateTimeBlock-OKBtn">Ок</a>
                            <a href="#" class="btn btn-secondary btn-sm inline-block ml-3 dateTimeBlock-cancelBtn">Отмена</a>
                        </div>

                    </div>

                    <div class="mt-3">
                        <select name="status" class="tail-select form-control">
                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }} >Черновик</option>
                            <option value="published" {{ $post->status != 'draft' ? 'selected' : '' }}>Публикация</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <select name="post_type" class="tail-select form-control">
                            <option value="post" {{ $post->post_type == 'post' ? 'selected' : '' }} >Запись</option>
                            <option value="bk" {{ $post->post_type == 'bk' ? 'selected' : '' }}>Обзор БК</option>
                            <option value="bonus" {{ $post->post_type == 'bonus' ? 'selected' : '' }}>Бонус</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="categories" class="form-label">Категория</label>
                        <select data-placeholder="Выберите категории" class="tail-select w-full" id="categories" name="categories[]"
                                multiple="" data-select-hidden="0" data-search="true" >
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->categories->contains('id', $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="tags" class="form-label">Теги</label>
                        <select data-placeholder="Выберите метки" class="tail-select w-full" id="tags" name="tags[]"
                                multiple="" data-select-hidden="0" data-search="true">
                            @forelse($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div style="text-align: right;" class="mt-10">
                        <a href="#" class="deletePost" style="color: red;" data-id="{{ $post->id }}">Удалить запись</a>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mt-3">
                        Миниатюра
                    </div>
                    <div class="mt-5">
                        <div class="image-fit w-48 h-48 m-auto cursor-pointer ">
                            <img class="imageChooser rounded-md" data-target="thumbnail_id" src="{{ $post->thumbnail ? asset($post->thumbnail->path) : asset('admin/images/no-image.png') }}" data-noimg="{{ asset('admin/images/no-image.png') }}">
                            <div class="w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 hidden deleteThumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                        </div>
                        <input type="hidden" name="thumbnail_id" value="{{ isset($post->thumbnail) ? $post->thumbnail->id : '' }}">
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </form>

@endsection
