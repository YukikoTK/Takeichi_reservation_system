document.addEventListener('DOMContentLoaded', function() {
    const areaSelect = document.getElementById('area');
    const genreSelect = document.getElementById('genre');
    const searchInput = document.getElementById('shop');
    const shopCards = document.querySelectorAll('.shop_card');

    function filterResults() {
        const areaKeyword = areaSelect.value.toLowerCase();
        const genreKeyword = genreSelect.value.toLowerCase();
        const searchKeyword = searchInput.value.trim().toLowerCase();

        shopCards.forEach(function(card) {
            const cardArea = card.querySelector('.tag_area').textContent.toLowerCase();
            const cardGenre = card.querySelector('.tag_genre').textContent.toLowerCase();
            const shopName = card.querySelector('.shop_name').textContent.toLowerCase();

            const areaMatch = cardArea.includes(areaKeyword) || areaKeyword === 'all';
            const genreMatch = cardGenre.includes(genreKeyword) || genreKeyword === 'all';
            const searchMatch = shopName.includes(searchKeyword);

            if (areaMatch && genreMatch && searchMatch) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    areaSelect.addEventListener('change', filterResults);
    genreSelect.addEventListener('change', filterResults);
    searchInput.addEventListener('input', filterResults);
});
