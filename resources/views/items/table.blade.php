<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">English Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Submitter</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td><a href="{{route('items.edit', $item->id)}}">{{ $item->english_name }}</a></td>
                    <td>{{ $item->brand->name }}</td>
                    <td>
                        @if ($item->submitter)
                            {{ $item->submitter->username }}
                        @else
                            Anonymous
                        @endif
                    </td>
                    <td><span class="badge badge-primary">{{ item_status($item->status) }}</span></td>
                    <td>{{ $item->created_at }}</td>
                    <td></td>
                </tr>

            @empty
                <p class="text-center">{{ __('ui.item.none') }}</p>
            @endif
        </tbody>
    </table>
</div>

@if ($items->count() > 0)
    {{ $items->links() }}
    <input type="hidden" id="search-page" value="{{ $items->currentPage() }}">
@endif
