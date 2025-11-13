<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Collect Element
        const searchForm = document.querySelector('form[action="<?= base_url('api/search'); ?>"]');
        const searchInput = document.querySelector('#searchInput');
        const dropdownMenu = searchInput.closest('.search-box').querySelector('#dropdownmenu');

        const keywordWrapper = document.querySelector('#keywordwrapper');
        const keyword = document.querySelector('#keyword');
        const drdWrapper = document.querySelector('#drdwrapper');
        const fallbackWrapper = document.querySelector('#fallbackwrapper');
        const fallback = document.querySelector('.fallbackwrapper');

        let debounceTimer;

        // Initial state
        keywordWrapper.style.display = 'none';
        keyword.textContent = '';
        drdWrapper.innerHTML = '';
        fallbackWrapper.style.display = 'none';
        dropdownMenu.classList.remove('show');

        const getSearchedHotel = function(e) {
            e.preventDefault();
            const query = searchInput.value.trim();

            clearTimeout(debounceTimer);

            drdWrapper.innerHTML = '';
            keywordWrapper.style.display = 'none';
            fallbackWrapper.style.display = 'none';


            if (query.length < 3) {
                drdWrapper.innerHTML = ''; // Ensure clear if short query
                fallbackWrapper.style.display = 'block'; // Show "No Result Found"
                keyword.textContent = ''; // Clear previous keyword
                keywordWrapper.style.display = 'none'; // Hide keyword header
                dropdownMenu.classList.add('show'); // Keep dropdown visible for fallback
                return;
            }

            drdWrapper.innerHTML +=
                `<div class="dropdown-item py-2 d-flex align-items-center skeleton-hotel">
                        <div class="file-thumbnail me-2 skeleton-img"></div>
                        <div class="flex-1">
                            <div class="skeleton-text w-75 mb-2"></div>
                            <div class="skeleton-text w-100"></div>
                        </div>
                    </div>`;

            dropdownMenu.classList.add('show');

            debounceTimer = setTimeout(function() {
                fetch(`<?= base_url('api/search'); ?>?keyword=${encodeURIComponent(query)}`, {
                        method: "GET",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(resp => {
                        if (!resp.ok) { // Check for HTTP errors
                            throw new Error(`HTTP error! status: ${resp.status}`);
                        }
                        return resp.json();
                    })
                    .then(resp => {
                        console.log(resp);
                        drdWrapper.innerHTML = '';
                        keyword.textContent = resp.keyword;
                        keywordWrapper.style.display = 'block';

                        if (resp.hotels && resp.hotels.length > 0) {
                            fallbackWrapper.style.display = 'none';
                            resp.hotels.forEach(hotel => {
                                const link = document.createElement('a');
                                link.className = 'dropdown-item py-2 d-flex align-items-center';
                                link.href = `<?= base_url('hotel/details/'); ?>${hotel.id}`;
                                link.innerHTML =
                                    `<div class="file-thumbnail me-2">
                                            <img class="h-100 w-100 object-fit-cover rounded-3" src="<?= base_url('image/hotel_thumbnail/'); ?>${hotel.id+'/'+hotel.thumbnail}" alt="${hotel.property_name}">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-body-highlight title">${hotel.property_name}</h6>
                                            <p class="fs-10 mb-0 d-flex text-body-tertiary">
                                                <span class="fw-medium text-body-tertiary text-opacity-85">
                                            ${hotel.description.substring(0, 30)}...
                                            </span>
                                            </p>
                                        </div>
                                        `;
                                drdWrapper.appendChild(link);
                            });

                        } else {
                            // No results found for the query
                            drdWrapper.innerHTML = ''; // Ensure drdWrapper is empty
                            fallbackWrapper.style.display = 'block'; // Show fallback message
                            keywordWrapper.style.display = 'block'; // Still show keyword header
                        }
                        dropdownMenu.classList.add('show');
                    })
                    .catch(err => {
                        console.error('Fetch error:', err);
                        drdWrapper.style.display = 'none';
                        drdWrapper.innerHTML = ''; // Clear any skeletons or previous content
                        keyword.textContent = ''; // Clear keyword
                        keywordWrapper.style.display = 'none'; // Hide keyword header on error
                        fallbackWrapper.style.display = 'block'; // Show fallback on error
                        fallbackWrapper.querySelector('p.fallback').textContent = 'Error loading results. Please try again.'; // Update fallback message
                        dropdownMenu.classList.add('show'); // Ensure dropdown stays open for error message
                    });
            }, 500);
        };

        searchForm.addEventListener('submit', getSearchedHotel);
        searchInput.addEventListener('keyup', getSearchedHotel);

        document.addEventListener('click', function(e) {
            // Check if the click is outside the search box AND the dropdown menu itself
            if (!searchInput.closest('.search-box').contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
                // Reset initial state when closed
                keywordwrapper.style.display = 'none';
                keyword.textContent = '';
                drdWrapper.innerHTML = '';
                fallbackWrapper.style.display = 'none';
            }
        });

        // Also hide dropdown if search input is focused out AND empty
        searchInput.addEventListener('blur', function() {
            if (searchInput.value.trim() === '') {
                dropdownMenu.classList.remove('show');
                keywordwrapper.style.display = 'none';
                keyword.textContent = '';
                drdWrapper.innerHTML = '';
                fallbackWrapper.style.display = 'none';
            }
        });
        document.addEventListener('click', function(e) {
            if (!searchInput.closest('.search-box').contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>