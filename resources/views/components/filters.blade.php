<div class="card">
    <div class="card-header">
        Filters
    </div>
    <div class="card-body">
      @foreach ($sections as $name => $items)
        <div class="input-group pb-2">
            <label class="control-label">{{ __($name + '.title')}}</label>
            <select style="width: 100%" v-model="state.categories" :options="categories" label="name" placeholder="Tap to filter" multiple>
              @foreach($items as $key => $value)
              <option value ="{{$key}}"> {{ $value }}</option>
              @endforeach
            </select>
            <div class="match_type"> Match
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-secondary active">
                    <input type="radio" name="{{ $name }}_matcher" value="OR" id="{{ $name }}_match_any" autocomplete="off" checked> Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="{{ $name }}_matcher" value="AND" id="{{ $name }}_match_all" autocomplete="off"> All
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="{{ $name }}_matcher" value="NONE" id="{{ $name }}_match_none" autocomplete="off"> None
                  </label>
                </div>
            </div>
        </div>
        @endforeach
        <div class="input-group pb-2">
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