<div class="card">
  <div class="card-body pb-0 pt-3">
    <div class="row">
      <div class="col-md-8 col-lg-9 col-xl-10 mb-3">
        <p class="sr-only">Type to search or filter</p>
        <input autocomplete="off" id="search" class="form-control input-lg" type="text" name="search" placeholder="Type to filter items by name" value="{{request('search')}}" role="search">
      </div>
      <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
        <button class="btn btn-block btn-outline-primary" name="action:search" id="search-btn">Search</button>
      </div>
    </div>
  </div>
</div>