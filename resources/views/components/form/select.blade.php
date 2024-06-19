@props(['id', 'items', 'selected', 'multiple' => true, 'required' => false])

<div class="form-group row">
    <label for="{{ $id }}" class="col-form-label col-sm-3">{{__('ui.search.'. $id)}}@if ($required)<span class="text-danger">*</span>@endif</label>
    <div class="col">
        <select
            name="{{$id}}@if ($multiple)[] @endif" 
            id="{{$id}}" 
            data-placeholder="Tap to filter"
            class="form-control form-control-chosen form-control-filter"
            @if ($required)required @endif
            @if ($multiple)multiple @endif
        >
              @foreach($items as $item)
              <option value ="{{$item->id}}" @if ($multiple && (in_array($item->id, old($id, []) ) || $selected->contains($item->id))) selected 
                @elseif ($item->id == old($id, $selected)) selected @endif>
                {{ __($item->name) }}
                </option>
              @endforeach
        </select>
    </div>
</div>