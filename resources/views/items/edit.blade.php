@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mb-3">
      <div class="col text-center">
        <h1 class="h3">Edit an Item</h1>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if ($item->published())
      <div class="row">
        <div class="col-lg-4">
          <ul class="list-group">
            <li class="list-group-item">Status: <span class="badge badge-success">PUBLISHED</span></li>
            <li class="list-group-item">
              Publisher: {{ $item->publisher && $item->publisher->name or 'Unknown' }}
              @if ($item->publisher && $item->publisher->is(auth()->user()))
                (You)
              @endif
            </li>
            <li class="list-group-item">Published: {{ $item->published_at->format('d M Y \a\t H:i:s') }}</li>
          </ul>
        </div>

        @if ($item->submitter && $item->submitter->is(auth()->user()) && auth()->user()->lolibrarian())
          <div class="col-lg-8">
            <div class="card text-white bg-success">
              <div class="card-body">
                You are able to edit this (published) item.
              </div>
            </div>
          </div>
        @elseif (auth()->user()->senior())
          <div class="col-lg-8">
            <div class="card text-white bg-success">
              <div class="card-body">
                You are able to edit this (published) item.
              </div>
            </div>
          </div>
        @else
          <div class="col-lg-8">
            <div class="card text-white bg-danger">
              <div class="card-body">
                You are unable to edit this item now that it has been published.
              </div>
            </div>
          </div>
        @endif
      </div>
    @endif

    <div class="col-sm p-2 px-4">
      <form method="POST">
        @csrf
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="image" class="col-form-label">Replace Main Image</label>

              <div>
                <a href="{{ cdn_link($item->image) }}">
                  <img src="{{ cdn_link($item->image) }}" alt="" style="height: 80px; max-width: 100%">
                </a>
              </div>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <label for="image" class="col-form-label">Additional Images</label>

              @foreach ($item->images as $image)
                <div class="row text-center">
                  <div class="col-6">
                    <a href="{{ cdn_link($image['attributes']['image']) }}">
                      <img src="{{ cdn_thumbnail($image['attributes']['image']) }}" alt=""
                        style="height: 80px; max-width: 100%">
                    </a>
                  </div>
                  <div class="col-6">
                    <a onclick="event.preventDefault(); $('#delete-image-{{ $image['key'] }}').submit();"
                      class="btn btn-sm btn-danger">
                      <i class="fal fa-fw fa-trash"></i>
                      delete
                    </a>
                  </div>
                </div>
              @endforeach
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>

              <div id="additional-container"></div>

              <button type="button" class="btn btn-xs btn-primary"
                onclick="$('<input name=\'images[]\' type=\'file\'>').appendTo($('#additional-container'))">add
                another image</button>
            </div>

          </div>

          <div class="col-lg-8">
            <x-form.text id="english_name" :required=true :value="$item->english_name" />
            <x-form.text id="foreign_name" :required=true :value="$item->foreign_name" />
            <x-form.text id="product_number" :value="$item->product_number" />
            <x-form.select id="brand" :items="$brands" :selected="$item->brand" :required=true :multiple=false />
            <x-form.select id="categories" :items="$categories" :selected="$item->categories" :required=true />
            <div class="form-group row">
              <label for="year" class="col-form-label col-sm-3">Release Year</label>
              <div class="col">
                <select name="year" id="year" class="form-control form-control-chosen">
                  @foreach (array_reverse(range(1970, date('Y') + 3)) as $year)
                    <option value="{{ $year }}" @if ($year == old('year', $item->year)) selected @endif>
                      {{ $year }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="currency" class="col-form-label">{{ __('ui.admin.currency') }}</span></label>

                  <select id="currency" name="currency" class="form-control form-control-chosen">
                    @foreach ($currencies as $code => $currency)
                      <option value="{{ $code }}" @if ($code === old('currency', $item->currency)) selected @endif>
                        {{ $currency }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="form-group">
                  <label for="price" class="col-form-label">{{ __('ui.admin.price') }}</label>
                  <input type="text" id="price" name="price" class="form-control" aria-describedby="price-help" >


                  <small class="form-text text-muted" id="price-help">{{ __('ui.admin.help.price') }}</small>
                </div>
              </div>
            </div>
            <hr>
            <x-form.select id="features" :items="$features" :selected="$item->features" />
            <x-form.select id="colors" :items="$colors" :selected="$item->colors" />
            <x-form.select id="tags" :items="$tags" :selected="$item->tags" />

            <div class="form-group">
              <label for="notes" class="col-form-label">Item Notes</label>
              <textarea id="notes" name="notes" class="form-control" rows="10">
                {{ $item->notes }}
              </textarea>
            </div>

            <div class="form-group">
                <label for="internal_notes" class="col-form-label">Internal Notes & Sources</label>
                <textarea id="internal_notes" name="internal_notes" class="form-control" rows="10" aria-describedby="internal_notes-help" >
                  {{ $item->internal_notes }}
                </textarea>

                <small class="form-text text-muted" id="internal_notes-help">{{ __('ui.admin.help.internal_notes') }}</small>
              </div>

            <div class="form-group">
              <label class="col-form-label">Attributes</label>
              <p class="form-text">
                Select a button below to add that particular attribute to this item.
              </p>
              <div class="col-lg-12" style="margin-bottom: 20px">
                @foreach ($attributes as $attribute)
                  <button type="button" class="btn btn-sm btn-default" data-type="attribute.button"
                    data-id="{{ $attribute->id }}" data-clicked="0" style="margin: 5px"
                    id="attribute-button-{{ $attribute->id }}">
                    {{ $attribute->name }}
                  </button>
                @endforeach
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                @foreach ($attributes as $attribute)
                  <div class="form-group row" id="attribute-{{ $attribute->id }}" style="display: none">
                    <label for="attribute.{{ $attribute->id }}"
                      class="col-form-label col-sm-3">{{ $attribute->name }}</label>
                    <div class="col">
                      <input type="text" id = "attribute.{{ $attribute->id }}" class="form-control"
                        value = "{{ $item->attributes->contains($attribute) ? $item->attributes->find($attribute)->pivot->value : null }}"
                        data-type="attribute.input" data-id="{{ $attribute->id }}">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-4 offset-lg-4 text-center">
            @if ($item->published())
              @if (
                  ($item->publisher && $item->publisher->is(auth()->user()) && auth()->user()->lolibrarian()) ||
                      auth()->user()->senior())
                <button type="submit" class="btn btn-success btn-block btn-lg">
                  Update Item
                </button>
              @else
                <button type="button" class="btn btn-success btn-block btn-lg" disabled>
                  Update Item
                </button>
              @endif
            @else
              <button type="submit" class="btn btn-primary btn-block btn-lg">
                Save as Draft
              </button>
            @endif
          </div>
        </div>

      </form>
    </div>

    @foreach ($item->images as $image)
      <form action="{{ route('items.images.destroy', [$item->id, $image['key']]) }}"
        id="delete-image-{{ $image['key'] }}" method="POST">
        @csrf
        @method('DELETE')
      </form>
    @endforeach

    <form action="{{ route('items.destroy', $item->id) }}" id="delete-item" method="POST">
        @csrf
      @method('DELETE')
    </form>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
      let selectSettings = {
        closeAfterSelect: true,
        plugins: ['remove_button']
      };
      document.querySelectorAll('.form-control-chosen').forEach((el) => {
        let tom = new TomSelect(el, selectSettings);
      });
      $('[data-type="attribute.button"]').click(function(event) {
        event.preventDefault();
        var $button = $(this),
          data = $button.data(),
          $attribute = $('#attribute-' + data.id);
        if (data.clicked) {
          $button.addClass('btn-default').removeClass('btn-primary');
          $button.data('clicked', 0);
          $attribute.hide();
        } else {
          $button.removeClass('btn-default').addClass('btn-primary');
          $button.data('clicked', 1);
          $attribute.show();
        }
      });
      $('[data-type="attribute.input"]').each(function() {
        var $input = $(this),
          data = $input.data(),
          $button = $('#attribute-button-' + data.id);
        if ($input.val()) {
          $button.click();
        }
      });
    });
  </script>
@endsection
