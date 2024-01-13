<div class="card">
    <div class="card-header">
        Filters
    </div>
    <div class="card-body">
      @foreach ($sections as $name => $items)
        <div class="pb-2">
            <label class="control-label" for="{{$name}}">{{ __('ui.search.' . $name)}}</label>
            <select style="width: 100%" name="{{$name}}[]" id="{{$name}}" data-placeholder="Tap to filter" multiple class="form-control form-control-chosen form-control-filter">
              @foreach($items as $item)
              <option value ="{{$item->slug}}" @if(in_array($item->slug, request($name, []) )) selected @endif> {{ __($item->name) }}</option>
              @endforeach
            </select>
            <div class="match_type"> {{__('ui.search.match_type')}}
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-secondary active btn-sm match-any">
                    <input type="radio" name="{{ $name }}_matcher" value="OR" id="{{ $name }}_match_any" autocomplete="off" checked> {{__('ui.search.match_any')}}
                  </label>
                  <label class="btn btn-outline-secondary btn-sm match-all">
                    <input type="radio" name="{{ $name }}_matcher" value="AND" id="{{ $name }}_match_all" autocomplete="off"> {{__('ui.search.match_all')}}
                  </label>
                  <label class="btn btn-outline-secondary btn-sm match-none">
                    <input type="radio" name="{{ $name }}_matcher" value="NONE" id="{{ $name }}_match_none" autocomplete="off"> {{__('ui.search.match_none')}}
                  </label>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pb-2">
            <label class="control-label" for="year-slider">Year</label>
            <div id="slider-wrapper">
            <input
                type="text"
                name="year"
                id="year-slider"
                data-slider-ticks="[1970, 2023]"
                data-slider-ticks-labels='["1970", "2023"]'
                data-slider-min="1970"
                data-slider-max="2023"
                data-slider-step="1"
                data-slider-tooltip-split="true"
                data-slider-value="[{{ request('year', '1970,2023') }}]"
            >
            </div>
            <div class="year_match_type"> {{__('ui.search.match_type')}}
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-secondary active btn-sm">
                    <input type="radio" name="year_matcher" value="OR" id="year_match_any" autocomplete="off" checked> {{__('ui.search.match_any')}}
                  </label>
                  <label class="btn btn-outline-secondary btn-sm">
                    <input type="radio" name="year_matcher" value="NONE" id="year_match_none" autocomplete="off"> {{__('ui.search.match_none')}}
                  </label>
                </div>
            </div>
        </div>

        <div class="input-group pb-2">
          <button class="btn btn-block btn-outline-primary" style="width: 100%" name="action:clear">Clear Filters</button>
        </div>
    </div>
</div>