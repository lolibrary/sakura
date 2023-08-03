<div class="card">
    <div class="card-header">
        Filters
    </div>
    <div class="card-body">
      @foreach ($sections as $name => $items)
        <div class="pb-2">
            <label class="control-label" for="{{$name}}">{{ __('ui.search.' . $name)}}</label>
            <select style="width: 100%" name="{{$name}}" id="{{$name}}" data-placeholder="Tap to filter" multiple class="form-control form-control-chosen">
              @foreach($items as $item)
              <option value ="{{$item->slug}}"> {{ __($name . '.' . $item->slug) }}</option>
              @endforeach
            </select>
            <div class="match_type"> {{__('ui.search.match_type')}}
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-secondary active btn-sm">
                    <input type="radio" name="{{ $name }}_matcher" value="OR" id="{{ $name }}_match_any" autocomplete="off" checked> {{__('ui.search.match_any')}}
                  </label>
                  <label class="btn btn-outline-secondary btn-sm">
                    <input type="radio" name="{{ $name }}_matcher" value="AND" id="{{ $name }}_match_all" autocomplete="off"> {{__('ui.search.match_all')}}
                  </label>
                  <label class="btn btn-outline-secondary btn-sm">
                    <input type="radio" name="{{ $name }}_matcher" value="NONE" id="{{ $name }}_match_none" autocomplete="off"> {{__('ui.search.match_none')}}
                  </label>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pb-2">
            <label class="control-label">Year</label>
            <v-select style="width: 100%" v-model="state.years" :options="years" placeholder="Tap to filter" multiple></v-select>
            <div v-if="state.years.length > 0" class="match_type"> Match
            <b-form-radio-group button-variant="outline-secondary" buttons size="sm" v-model="state.year_matcher" :options="options"></b-form-radio-group>
            </div>
        </div>

        <div class="input-group pb-2">
          <button class="btn btn-block btn-outline-primary" style="width: 100%" name="action:clear">Clear Filters</button>
        </div>
    </div>
</div>