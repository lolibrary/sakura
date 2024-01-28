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
            searchJs.year_slider.on('slideStop', (evt) => {
                searchJs.doSearch();
            });

            $('.form-control-chosen').chosen().on('change', (evt) => {
                let filter = $(evt.currentTarget);
                searchJs.matchVisibility(filter);
                searchJs.doSearch();
            });

            $('button[name="action:search"]')
            .on('click', (evt) => {
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

                $('select.form-control-filter').val([]);
                $('select.form-control-filter').trigger('chosen:updated');
                $('.match_type').hide();
                let slider_min = parseInt($("#year-slider").data('slider-min'), 10);
                let slider_max = parseInt($("#year-slider").data('slider-max'));
                searchJs.year_slider.slider('setValue', [slider_min, slider_max]);

                let any = $('.match-any');
                any.find('input').prop('checked', true);
                any.addClass('active');

                let all_none = $('.match-all, .match-none');
                all_none.find('input').prop('checked', false);
                all_none.removeClass('active');
                searchJs.doSearch();
            });

            $('select.form-control-filter').each(function(){searchJs.matchVisibility($(this))});
        },

        triggerSearch: (evt) => {
            evt.stopPropagation();
            evt.preventDefault();
            searchJs.doSearch();
        },
        doSearch: () => {
            let form = document.getElementById('search-form');
            let form_values = searchJs.getFormValues();
            searchJs.loader.css('display', 'block');
            searchJs.results.css('display', 'none');
            window.history.pushState(null, null, '/search/?' + $.param(form_values));
            fetch('/search', { method: "POST", headers: searchJs.headers, body: new FormData(form)})
                .then((response) => response.text())
                .then((text) => {
                    searchJs.loader.css('display', 'none');
                    searchJs.results.css('display', 'block');
                    searchJs.results.html(text);
                });
        },
        matchVisibility: (filter) => {
            let matcher = filter.nextAll('.match_type');
            if (filter.val().length > 0) {
                matcher.show();
            } else {
                matcher.hide();
            }
        },

        getFormValues: () => {
            let form_values = $('#search-form').serializeArray();
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
