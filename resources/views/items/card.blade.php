<div class="card">
    <div class="card-body text-center">
        <p class="mb-0"
            title="{{ $item->english_name }}"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;">
            <a href="{{ $item->url }}">
                {{ $item->english_name }}
            </a>
        </p>
        <p class="text-muted small mb-0"
            title="{{ $item->foreign_name }}"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;">
            @if ($item->foreign_name)
                {{ $item->foreign_name }}
            @else
                &nbsp;
            @endif
        </p>
        <p class="text-muted itemnum mb-0"
            title="{{ $item->product_number }}"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;">
            @if ($item->product_number)
                {{ $item->product_number }}
            @else
                &nbsp;
            @endif
        </p>

        <div style="height: {{ ($type ?? null) === 'small' ? '7rem' : '14rem' }}" class="text-center">
            <a href="{{ $item->url }}">
                <img src="$item->image ? Storage::cloud()->url($item->image) : default_asset()" class="mw-100 mh-100 rounded"
                    onerror="if (this.src !== '{{ default_asset() }}') this.src = '{{ default_asset() }}'">
            </a>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item py-1 px-3">
            <div class="d-flex small">
                <p class="p-0 m-0 text-center flex-fill" style="white-space: nowrap; overflow-x: ellipsis;">
                    <a href="{{ $item->brand->url }}" title="{{ $item->brand->name }}">
                        {{$item->brand->name}}
                        {{-- deliberately chose 21 as the cutoff since lots of brand names fit on word boundaries. --}}
                    </a>
                </p>
            </div>
                <div class="d-flex small">
                <p class="p-0 m-0 text-center small flex-fill" style="white-space: nowrap; overflow-x: hidden">
                @foreach($item->categories as $category)
                    <a href="{{ $category->url }}" class="category">
                        {{ $category->name }}
                    </a>
                 @endforeach
                </p>
            </div>
        </li>
    </ul>
    <a class=" btn btn-outline-primary rounded-0" style="border: none;" href="{{ $item->url }}">
        {{ __('ui.item.view') }}
    </a>
    @senior
    <a class=" btn btn-outline-primary rounded-0" style="border: none;" href="{{ $item->edit_url }}">
        {{ __('ui.item.edit') }}
    </a>
    @endsenior

    {{ $slot ?? '' }}
</div>
