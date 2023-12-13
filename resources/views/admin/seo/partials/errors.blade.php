<div class="accordion-body text-gray-700 leading-relaxed">
    <ul>
        @if( isset($errors) and !empty($errors) )
            @foreach(json_decode($errors) as $error)
                <li>
                    <svg aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                    {{ $error }}
                </li>
            @endforeach
        @else
            <li>
                <svg aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="green"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                Ошибок нет
            </li>
        @endif
    </ul>
    <input type="hidden" name="seo[errors]" value="{{ isset($errors) && !empty($errors) ? $errors : '' }}">
</div>
