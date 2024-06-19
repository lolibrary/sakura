@props(['id', 'value' => null, 'required' => false])

<div class="form-group row">
    <label for="{{ $id }}" class="col-form-label col-sm-3">{{__('ui.admin.'. $id)}}@if ($required)<span class="text-danger">*</span>@endif</label>
    <div class="col">
        <input 
            type="text" 
            id="{{ $id }}" 
            name="{{ $id }}" 
            class="form-control" 
            aria-describedby="{{ $id }}-help" 
            value="{{old($id, $value)}}"
            @if ($required)required @endif
        >

        <small class="form-text text-muted" id="{{ $id }}-help">{{ __('ui.admin.help.'. $id)}}</small>
    </div>
</div>