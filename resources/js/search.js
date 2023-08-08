const token = document.head.querySelector('meta[name="csrf-token"]');

$(() => {
    let year_slider = $("#year-slider").slider();

    $('select.form-control-filter').on('change', (evt) => {
        let filter = $(evt.target);
        matchVisibility(filter);
    })

    function matchVisibility(filter) {
        let matcher = filter.nextAll('.match_type');
        if (filter.val().length > 0) {
            matcher.show();
        } else {
            matcher.hide();
        }
    }

    $('button[name="action:search"]').on('click', (evt) => {
        evt.stopPropagation();
        evt.preventDefault();

        doSearch();
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
    })

    $('select.form-control-filter').each(function(){matchVisibility($(this))});
});

const headers = {
    "X-CSRF-TOKEN": token.content,
    "X-Requested-With": "XMLHttpRequest",
  };

const results = document.getElementById("search-results");

function doSearch() {
    let form = document.getElementById('search-form');
    fetch('/search', { method: "POST", headers: headers, body: new FormData(form)})
        .then((response) => response.text())
        .then((text) => {
        results.innerHTML = text;
        });
  }