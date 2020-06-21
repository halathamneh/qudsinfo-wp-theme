function searchBox() {
    document.querySelector('.search-menu-button .toggle-search').addEventListener('click', e => {
        document.body.classList.add('search-visible');
        setTimeout(() =>
            document.querySelector('.search-menu-button input').focus(), 500);
    })

    document.querySelector('.search-menu-button .search-close-button').addEventListener('click', e => {
        document.body.classList.remove('search-visible');
    })
}

searchBox();