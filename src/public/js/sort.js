document.addEventListener('DOMContentLoaded', function () {
    const sortSelect = document.getElementById('sort_select');

    sortSelect.addEventListener('change', function () {
        var sortValue = this.value;
        var baseUrl = window.location.origin + window.location.pathname;

        if (sortValue === 'random') {
            window.location.href = baseUrl + "?sort=random";
        } else if (sortValue === 'high_to_low') {
            window.location.href = baseUrl + "?sort=high_to_low";
        } else if (sortValue === 'low_to_high') {
            window.location.href = baseUrl + "?sort=low_to_high";
        }
    });
});
