<div class="card">
    <div class="card-header">
        <label class="control-label" for="sort">{{__('ui.sort.title')}}</label>
    </div>
    <div class="card-body">
        <div class="pb-2">
            <select style="width: 100%" name="sort" id="sort" data-placeholder="Tap to sort" class="form-control form-control-filter">
              @foreach($sorts as $sort)
              <option value ="{{$sort}}" @if(in_array($sort, request($sort, []) )) selected @endif> {{ __('ui.sort.' . $sort)}}</option>
              @endforeach
            </select>
        </div>
    </div>
</div>