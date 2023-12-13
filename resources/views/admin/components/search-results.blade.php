@forelse($results as $result)
    <div class="item">
        <a href="{{ route('admin.' . $type . '.edit', [$result->id]) }}">
            {{ $result->{$column} }}
        </a>
    </div>
@empty
    <div>
        По Вашему запросу ничего не найдено..
    </div>
@endforelse
