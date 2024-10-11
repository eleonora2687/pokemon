document.addEventListener('DOMContentLoaded', function () {
    const desktopSearchInput = document.getElementById('pokemon-search-desktop');
    const mobileSearchInput = document.getElementById('pokemon-search-mobile');
    const desktopSearchButton = document.getElementById('search-button-desktop');
    const mobileSearchButton = document.getElementById('search-button-mobile');

    // Function to handle search
    function triggerSearch(query) {
        window.location.href = `/search-pokemon?query=${query}`;
    }

    // Add event listeners for desktop
    if (desktopSearchInput && desktopSearchButton) {
        desktopSearchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission
                triggerSearch(this.value); // Trigger search when Enter is pressed
            }
        });

        desktopSearchButton.addEventListener('click', function () {
            triggerSearch(desktopSearchInput.value);
        });
    }

    // Add event listeners for mobile
    if (mobileSearchInput && mobileSearchButton) {
        mobileSearchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission
                triggerSearch(this.value); // Trigger search when Enter is pressed
            }
        });

        mobileSearchButton.addEventListener('click', function () {
            triggerSearch(mobileSearchInput.value);
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
