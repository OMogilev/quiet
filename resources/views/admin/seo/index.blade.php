<div id="seo">
    <div class="mb-5 text-right">
{{--        <a class="btn btn-success seoGenerate" href="{{ route('admin.seo.generate') }}">Генерация SEO</a>--}}
    </div>
    <div class="post__tabs nav nav-tabs flex-col sm:flex-row bg-gray-300 text-gray-600" >
        <a data-toggle="tab" data-target="#comp" href="#"
           class="w-full sm:w-40 py-4 text-center flex justify-center items-center active" data-tab="comps">
            Компьтеры
        </a>
        <a data-toggle="tab" data-target="#phone" href="#"
           class="w-full sm:w-40 py-4 text-center flex justify-center items-center" data-tab="phones">
            Телефоны
        </a>
    </div>

    @php
        $title = old('seo.title', isset($data) && isset($data->seo) && isset($data->seo->title) ? $data->seo->getRawOriginal('title') : '');
        $description = old('seo.description', isset($data) && isset($data->seo) && isset($data->seo->description) ? $data->seo->description : '');
        $slug = old('slug', isset($data) && isset($data->slug) ? '/' . $data->slug : '');
        $slugMobile = !empty($slug) ? str_replace('/', '>', $slug) : '';
    @endphp

    <div class="post__content tab-content">
        <div id="comps" class="tab-pane py-3 active">
            <div class="seo-box p-5">
                <div class="title">{{ $title }}</div>
                <div class="slug mt-2 mb-2">{{ $slug }}</div>
                <div class="description">{{ $description  }}</div>
            </div>
        </div>

        <div id="phones" class="tab-pane py-3">
            <div class="seo-box p-5">
                <div class="title">{{ $title }}</div>
                <div class="slug mt-2 mb-2">{{ $slugMobile }}</div>
                <div class="body">
                    <div class="description">{{ $description  }}</div>
                    <div class="image">
                        <img src="{{ isset($data) && $data->thumbnail ? asset($data->thumbnail->path) : asset('admin/images/no-image.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="seo-tools">
        <div class="accordion accordion-boxed">
            <div class="accordion-item">
                <div id="inputs" class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#inputs-list" aria-expanded="true" aria-controls="inputs-list"> Редактор SEO </button>
                </div>
                <div id="inputs-list" class="accordion-collapse collapse show" aria-labelledby="inputs" data-bs-parent="#faq-accordion-1" style="display: block;">
                    <div class="accordion-body text-gray-700 leading-relaxed">
                        <div>
                            <label for="regular-form-1" class="form-label">Title</label>
                            <input type="text" class="form-control mb-2" name="seo[title]" placeholder="Title" value="{{ $title }}" />
                        </div>
                        <div>
                            <label for="regular-form-1" class="form-label">Сниппет</label>
                            <textarea name="seo[description]" class="form-control" rows="2" placeholder="Сниппет">{{ $description }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div id="seo-analize-btn" class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seo-analize-list" aria-expanded="false" aria-controls="seo-analize-list"> SEO анализ </button>
                </div>
                <div id="seo-analize-list" class="accordion-collapse collapse" aria-labelledby="seo-analize-btn" data-bs-parent="#faq-accordion-1" style="display: none;">
                    @include('admin.seo.partials.errors', ['errors' => isset($data) && isset($data->seo) ? $data->seo->errors : []])
                </div>
            </div>
        </div>
    </div>

</div>
