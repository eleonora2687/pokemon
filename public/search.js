document.addEventListener('DOMContentLoaded', function () {
    const desktopSearchInput = document.getElementById('pokemon-search-desktop');
    const mobileSearchInput = document.getElementById('pokemon-search-mobile');
    const desktopSearchButton = document.getElementById('search-button-desktop');
    const mobileSearchButton = document.getElementById('search-button-mobile');

    // Check if elements exist and only then add event listeners
    if (desktopSearchInput && desktopSearchButton) {
        desktopSearchInput.addEventListener('input', function () {
            performSearch(this.value);
        });

        desktopSearchButton.addEventListener('click', function () {
            const query = desktopSearchInput.value;
            window.location.href = `/search-pokemon?query=${query}`;
        });
    }

    if (mobileSearchInput && mobileSearchButton) {
        mobileSearchInput.addEventListener('input', function () {
            performSearch(this.value);
        });

        mobileSearchButton.addEventListener('click', function () {
            const query = mobileSearchInput.value;
            window.location.href = `/search-pokemon?query=${query}`;
        });
    }
});

function performSearch(query) {
    if (query.length >= 1) {
        fetch(`/search-pokemon?query=${query}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Handle data
        })
        .catch(error => {
            console.error('Error fetching Pokémon:', error);
        });
    
    } else {
        document.getElementById('pokemon-suggestions').style.display = 'none';
    }
}
