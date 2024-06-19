const token = document.head.querySelector('meta[name="csrf-token"]');

$(() => {
    const searchJs = {
        headers: {
            "X-CSRF-TOKEN": token.content,
            "X-Requested-With": "XMLHttpRequest",
        },
        init: () => {
            searchJs.year_slider = $("#year-slider").slider();
            searchJs.loader = $('#search-results-loading');
            searchJs.results = $('#search-results');
            searchJs.error = $('#search-results-error');
            searchJs.year_slider.on('slideStop', (evt) => {
                searchJs.yearMatchVisibility();
                searchJs.doSearch();
            });
            searchJs.filters = [];

            let selectSettings = {closeAfterSelect: true, plugins: ['remove_button']};
            document.querySelectorAll('.form-control-chosen').forEach((el)=>{
                 let tom = new TomSelect(el, selectSettings);
                 tom.on('change', (val) => {
                    searchJs.matchVisibility(tom, val);
                    searchJs.doSearch();
                });
                searchJs.filters.push(tom);
            });

            $('button[name="action:search"]')
            .on('click', (evt) => {
                searchJs.triggerSearch(evt);
            });

            $('#search-results')
            .on('click', '.page-link', (evt) => {
                let url = new URL($(evt.target).attr('href'));
                let page = url.searchParams.get("page");
                if (page) {
                    $("#search-page").val(page);
                }

                searchJs.triggerSearch(evt);
            });

            $('.match_type input:radio, .year_match_type input:radio')
            .on('click', (evt) => {
                $(evt.currentTarget).parent().parent().find('label').removeClass('active');
                $(evt.currentTarget).parent().addClass('active');
                searchJs.doSearch();
            })


            $('#search').on('keypress', (evt) => {
                if (evt.which == 13) {
                    searchJs.triggerSearch(evt)
                }
            });

            $('button[name="action:clear"]').on('click', (evt) => {
                evt.stopPropagation();
                evt.preventDefault();

                searchJs.filters.forEach((filter) => filter.clear());
                $('.match_type, .year_match_type').hide();
                let slider_min = parseInt($("#year-slider").data('slider-min'), 10);
                let slider_max = parseInt($("#year-slider").data('slider-max'), 10);
                searchJs.year_slider.slider('setValue', [slider_min, slider_max]);

                let any = $('.match-any');
                any.find('input').prop('checked', true);
                any.addClass('active');

                let all_none = $('.match-all, .match-none');
                all_none.find('input').prop('checked', false);
                all_none.removeClass('active');
                searchJs.doSearch();
            });

            searchJs.filters.forEach((filter) => {searchJs.matchVisibility(filter, filter.getValue());});
            searchJs.yearMatchVisibility();
        },

        triggerSearch: (evt) => {
            evt.stopPropagation();
            evt.preventDefault();
            searchJs.doSearch();
        },
        doSearch: () => {
            let form = document.getElementById('search-form');
            let form_values = searchJs.getFormValues();
            let pageEl = document.getElementById('search-page');
            searchJs.loader.css('display', 'block');
            searchJs.results.css('display', 'none');
            searchJs.error.css('display', 'none');
            let form_data = new FormData(form);
            if (pageEl) {
                let page = pageEl.value;
                form_data.set('page', page); 
            }
            window.history.pushState(null, null, '/search/?' + $.param(form_values));
            fetch('/search', { method: "POST", headers: searchJs.headers, body: form_data})
                .then((response) => {
                    if (response.ok) {
                        return response.text()
                        .then((text) => {
                            searchJs.loader.css('display', 'none');
                            searchJs.results.css('display', 'block');
                            searchJs.results.html(text);
                        });

                    } else {
                        searchJs.loader.css('display', 'none');
                        searchJs.error.css('display', 'block');
                    }
                })
                
        },
        matchVisibility: (filter, val) => {
            let matcher = $(filter.wrapper).nextAll('.match_type');
            if (val.length > 0) {
                matcher.show();
            } else {
                matcher.hide();
            }
        },
        useYear:() => {
            const val = searchJs.year_slider.slider('getValue').sort();
            const min = $("#year-slider").data('slider-min');
            const max = $("#year-slider").data('slider-max');
            if (val[0] == min && val[1] == max) {
                const match_type = $(".year_match_type input:checked").val();
                return (match_type == "NOT");
            } else {
                return true;
            }
        },
        yearMatchVisibility: () => {
            let matcher = $(".year_match_type");
            if (searchJs.useYear()) {
                matcher.show();
            } else {
                let any = $('.match-any');
                any.find('input').prop('checked', true);
                any.addClass('active');

                let none = $('.match-none');
                none.find('input').prop('checked', false);
                none.removeClass('active');
                matcher.hide();
            }
        },
        getFormValues: () => {
            let form_values = $('#search-form').serializeArray();
            let page = $('#search-page').val();
            if (page && page > 1) {
                form_values.push({name: "page", value: page.toString()});
            }
            let exclude_matching = ['search'];
            let filter_names = form_values.map((form_obj) => form_obj.name.replace('[]', ''));
            return form_values.filter((form_obj) => {
                let filter_name = form_obj.name.toLowerCase();
                if (filter_name === 'search' && form_obj.value == '') {
                    return false;
                }
                if (exclude_matching.includes(filter_name)) {
                    return true;
                }
                if (filter_name === 'year' || filter_name == 'year_matcher') {
                    return searchJs.useYear();
                }
                let match_index = filter_name.search('matcher');
                if (match_index !== -1) {
                    let base_filter = filter_name.substr(0, match_index - 1);
                    if (!filter_names.includes(base_filter)) {
                        return false;
                    }
                }
                return true;
            });
        }
    }

    searchJs.init();
});
