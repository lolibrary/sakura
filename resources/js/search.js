const token = document.head.querySelector('meta[name="csrf-token"]');

$(() => {
    let year_slider = $("#year-slider").slider();

    year_slider.on('slideStop', (evt) => {
       doSearch();
    });

    $('.form-control-chosen').chosen().on('change', (evt) => {
        let filter = $(evt.currentTarget);
        matchVisibility(filter);
        doSearch();
    })

    $('button[name="action:search"]')
    .on('click', (evt) => {
        triggerSearch(evt)
    })

    $('.match_type input:radio, .year_match_type input:radio')
        .on('click', (evt) => {
            $(evt.currentTarget).parent().parent().find('label').removeClass('active');
            $(evt.currentTarget).parent().addClass('active');
            doSearch();
        })

    $('#search').on('keypress', (evt) => {
        if (evt.which == 13) {
            triggerSearch(evt)
        }
    })

    $('button[name="action:clear"]').on('click', (evt) => {
        evt.stopPropagation();
        evt.preventDefault();

        $('select.form-control-filter').val([]);
        $('select.form-control-filter').trigger('chosen:updated');
        $('.match_type').hide();
        year_slider.slider('setValue', [1970, 2023]);

        let any = $('.match-any');
        any.find('input').prop('checked', true);
        any.addClass('active');

        let all_none = $('.match-all, .match-none');
        all_none.find('input').prop('checked', false);
        all_none.removeClass('active');
        doSearch();
    })

    $('select.form-control-filter').each(function(){matchVisibility($(this))});
});

const headers = {
    "X-CSRF-TOKEN": token.content,
    "X-Requested-With": "XMLHttpRequest",
  };

const results = $('#search-results');
const loader = $('#search-results-loading');

function matchVisibility(filter) {
    let matcher = filter.nextAll('.match_type');
    if (filter.val().length > 0) {
        matcher.show();
    } else {
        matcher.hide();
    }
}

function triggerSearch(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    doSearch();
}

function getFormValues() {
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

function doSearch() {
    let form = document.getElementById('search-form');
    let form_values = getFormValues();
    loader.css('display', 'block');
    results.css('display', 'none');
    window.history.pushState(null, null, '/search/?' + $.param(form_values));
    fetch('/search', { method: "POST", headers: headers, body: new FormData(form)})
        .then((response) => response.text())
        .then((text) => {
            loader.css('display', 'none');
            results.css('display', 'block');
            results.html(text);
        });
  }
