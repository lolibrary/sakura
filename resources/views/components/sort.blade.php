<div class="card">
    <div class="card-header">
      {{__('ui.sort.title')}}
    </div>
    <div class="card-body">
        <div class="pb-2">
            <label class="control-label" for="sort">{{ __('ui.sort.title')}}</label>
            <select style="width: 100%" name="sort" id="sort" data-placeholder="Tap to sort" class="form-control form-control-chosen form-control-filter">
              @foreach($sorts as $sort)
              <option value ="{{$sort}}" @if(in_array($sort, request($sort, []) )) selected @endif> {{ __('ui.sort.' . $sort)}}</option>
              @endforeach
            </select>
        </div>
    </div>
</div>