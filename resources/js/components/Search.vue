<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-3 mb-2 mb-3">

        <div class="card">
            <div class="card-header">
                Filters
            </div>
            <div class="card-body">
                <div class="input-group pb-2">
                    <label class="control-label">Category</label>
                    <v-select style="width: 100%" v-model="state.categories" :options="categories" label="name" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.categories.length > 0" class="match_type"> Match
                    <b-form-radio-group buttons button-variant="outline-secondary" size="sm" v-model="state.category_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                    <label class="control-label">Brand</label>
                    <v-select style="width: 100%" v-model="state.brands" :options="brands" label="name" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.brands.length > 0" class="match_type"> Match
                    <b-form-radio-group buttons button-variant="outline-secondary" size="sm" v-model="state.brand_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                    <label class="control-label">Features</label>
                    <v-select style="width: 100%" v-model="state.features" :options="features" label="name" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.features.length > 0" class="match_type"> Match
                    <b-form-radio-group buttons button-variant="outline-secondary" size="sm" v-model="state.feature_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                    <label class="control-label">Colorway</label>
                    <v-select style="width: 100%" v-model="state.colors" :options="colors" label="name" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.colors.length > 0" class="match_type"> Match
                    <b-form-radio-group buttons button-variant="outline-secondary" size="sm" v-model="state.color_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                    <label class="control-label">Tags</label>
                    <v-select style="width: 100%" v-model="state.tags" :options="tags" label="name" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.tags.length > 0" class="match_type"> Match
                    <b-form-radio-group button-variant="outline-secondary" buttons size="sm" v-model="state.tag_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                    <label class="control-label">Year</label>
                    <v-select style="width: 100%" v-model="state.years" :options="years" placeholder="Tap to filter" multiple></v-select>
                    <div v-if="state.years.length > 0" class="match_type"> Match
                    <b-form-radio-group button-variant="outline-secondary" buttons size="sm" v-model="state.year_matcher" :options="options"></b-form-radio-group>
                    </div>
                </div>
                <div class="input-group pb-2">
                  <button class="btn btn-block btn-outline-primary" style="width: 100%" @click="clearAll">Clear Filters</button>
                </div>
            </div>
        </div>

      </div>

      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row mb-3">
          <div class="col px-2">
            <div class="card">
              <div class="card-body pb-0 pt-3">
                <div class="row">
                  <div class="col-md-8 col-lg-9 col-xl-10 mb-3">
                    <p class="sr-only">Type to search or filter</p>
                    <input autocomplete="off" v-model="state.search" class="form-control input-lg" type="text" name="search" placeholder="Type to filter items by name" role="search">
                  </div>
                  <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <button class="btn btn-block btn-outline-primary" @click="performSearch">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div v-if="!loading">

          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-2" v-for="result in results.data">
              <search-result :item="result" :user="user"></search-result>
            </div>
          </div>

          <div v-if="results && results.last_page > 1" class="row">
            <div class="col mb-2 mt-4">
              <v-pagination style="font-family: Helvetica, Arial, sans-serif;" :limit="2" :data="results" @pagination-change-page="updatePage"></v-pagination>
            </div>
          </div>

          <div v-if="results && results.data && results.data.length === 0" class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mx-auto p-2">
              <div style="height: 14rem">
                <img src="/categories/other.svg" class="mw-100 mh-100">
              </div>
              <p class="h4 text-center text-muted my-0">No Results!</p>
              <p class="text-center">Try another search?</p>
            </div>
          </div>
        </div>

        <div class="row text-center p-5" v-if="loading">
          <div class="col text-center text-muted">
            <i class="far fa-5x fa-spinner fa-pulse"></i>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
    import qs from 'qs';
    import debounce from 'lodash/debounce';

    const axios = window.axios;

    const fetchInitialState = () => {
      const query = window.location.search.replace(/^\?/, '');

      return qs.parse(query);
    };

    const shouldSearch = query => {
      let copy = Object.create(query);
      delete copy.page;

      return _.isEmpty(copy);
    }

    export default {
        props: {
          categories: {
            type: Array,
            default() {
              return [];
            }
          },
          features: {
            type: Array,
            default() {
              return [];
            }
          },
          brands: {
            type: Array,
            default() {
              return [];
            }
          },
          colors: {
            type: Array,
            default() {
              return [];
            }
          },
          years: {
            type: Array,
            default() {
              return [];
            }
          },
          tags: {
            type: Array,
            default() {
              return [];
            }
          },
          url: {
            type: String,
            default: '',
          },
          endpoint: {
            type: String,
            default: '',
          },
          user: {
            type: Object,
            default() {
              return {username: "", level: 0};
            }
          }
        },

        data() {
          return {
            results: {},
            loading: false,

            // Options for the match type selector
            options: [
              { text: 'Any', value: 'OR' },
              { text: 'All', value: 'AND' },
              { text: 'None', value: 'NOT' }
            ],

            // a function so we can read the initial state from the url.
            state: {
              search: undefined,
              categories: [],
              brands: [],
              features: [],
              tags: [],
              colors: [],
              years: [],
              category_matcher: 'OR',
              brand_matcher: 'OR',
              feature_matcher: 'OR',
              tag_matcher: 'OR',
              color_matcher: 'OR',
              year_matcher: 'OR'
            },

            page: 1,
          }
        },

        methods: {
          updatePage(page) {
            this.page = page;

            this.$nextTick(function () {
              this.performSearch();
            });
          },

          performSearch() {
            this.loading = true;

            axios.post(this.endpoint + '?page=' + this.page, this.search).then(results => {
              this.results = results.data;
              this.loading = false;
            });
          },

          clearAll() {
            this.state = {
              search: undefined,
              categories: [],
              brands: [],
              features: [],
              tags: [],
              colors: [],
              years: [],
              category_matcher: 'OR',
              brand_matcher: 'OR',
              feature_matcher: 'OR',
              tag_matcher: 'OR',
              color_matcher: 'OR',
              year_matcher: 'OR'
            }
          }
        },

        watch: {
          search() {
            this.page = 1;

            this.debouncedSearch();
          }
        },

        created() {
          this.debouncedSearch = _.debounce(this.performSearch, 300);

          const query = fetchInitialState();

          let value;
          for (let key of ["categories", "features", "brands", "colors", "tags"]) {
            value = query[key];

            if (value === undefined) {
              continue;
            }

            this.state[key] = this[key].filter(obj => value.indexOf(obj.slug) !== -1);
          }

          for (let key of ["category_matcher", "feature_matcher", "brand_matcher", "color_matcher", "tag_matcher", "year_matcher"]) {
            value = query[key];

            if (value === undefined) {
              continue;
            }

            this.state[key] = ['AND', 'OR', 'NOT'].includes(value) ? value : undefined;
          }

          if (query.search !== undefined && query.search.length > 0) {
            this.state.search = query.search;
          }

          if (query.years !== undefined && query.years.length > 0) {
            this.state.years = query.years.map(year => year.toString());
          }

          if (query.page !== undefined) {
            this.page = query.page;
          }

          if (shouldSearch(query)) {
            this.$nextTick(function () {
              this.performSearch();
            });
          }
        },

        // dynamically generate a search property to use in searches whenever state changes.
        computed: {
          search() {
            return {
              search: this.state.search,
              categories: this.state.categories.map(obj => obj.slug),
              brands: this.state.brands.map(obj => obj.slug),
              features: this.state.features.map(obj => obj.slug),
              tags: this.state.tags.map(obj => obj.slug),
              colors: this.state.colors.map(obj => obj.slug),
              years: this.state.years.map(year => parseInt(year, 10)),
              category_matcher: this.state.categories.length > 0 ? this.state.category_matcher : undefined,
              brand_matcher: this.state.brands.length > 0 ? this.state.brand_matcher : undefined,
              feature_matcher: this.state.features.length > 0 ? this.state.feature_matcher : undefined,
              tag_matcher: this.state.tags.length > 0 ? this.state.tag_matcher : undefined,
              color_matcher: this.state.colors.length > 0 ? this.state.color_matcher : undefined,
              year_matcher: this.state.years.length > 0 ? this.state.year_matcher : undefined,
            };
          }
        },

        // on an update, update the URL.
        updated() {
          const query = qs.stringify(
            Object.assign(this.search, { page: this.page }),
            { encodeValuesOnly: true, arrayFormat: 'brackets', indices: false }
          );

          window.history.pushState(this.search, query, this.url + '?' + query);
        },

        components: {}
    }
</script>
