jQuery(document).ready(function($) {
    console.log('Document is ready');  // Check if the document is loaded

    let typingTimer;  // Timer variable to handle debouncing
    const doneTypingInterval = 1000;  // Time in ms (1000 ms = 1 second)
    let isSpinnerVisible = false;  // Flag to track spinner visibility

    $('#search-input').on('keyup', function() {
        let searchVal = $(this).val().trim();
        console.log('Search value:', searchVal);  // Check the search value

        // Clear the previous timer if the user types again before the delay
        clearTimeout(typingTimer);

        // Show the overlay and spinner immediately if not visible
        if (searchVal.length > 0 && !isSpinnerVisible) {
            $('.search-overlay').addClass('active');
            $('#search-results').html('<div class="loading-spinner"></div>');  // Add the spinner
            isSpinnerVisible = true;  // Set the spinner flag to true
        } else if (searchVal.length === 0) {
            // If input is cleared, hide the overlay and clear results
            $('.search-overlay').removeClass('active');
            $('#search-results').html('');
            isSpinnerVisible = false;  // Reset spinner visibility flag
        }

        // Set a new timer to trigger after typing stops for 1 second
        typingTimer = setTimeout(function() {
            if (searchVal.length > 2) {
                $.ajax({
                    type: 'POST',
                    url: search_params.ajaxurl,
                    data: {
                        action: 'custom_ajax_search',
                        search: searchVal
                    },
                    success: function(response) {
                        console.log('Search response:', response); // Debug response
                        $('#search-results').html(response);  // Display results
                        if (response.length > 0) {
                            $('.search-overlay').addClass('active');
                        } else {
                            $('.search-overlay').removeClass('active');
                        }
                        isSpinnerVisible = false;  // Reset spinner flag after results are loaded
                    },
                    error: function(xhr, status, error) {
                        console.log('Error retrieving results:', status, error);
                        $('#search-results').html('<div class="search-result-item">Error retrieving results</div>');
                        $('.search-overlay').removeClass('active');
                        isSpinnerVisible = false;  // Reset spinner flag on error
                    }
                });
            } else {
                $('#search-results').html('');  // Clear results if the input is too short
                $('.search-overlay').removeClass('active');
                isSpinnerVisible = false;  // Reset spinner flag
            }
        }, doneTypingInterval);  // Wait until typing has stopped for 1 second
    });

    // Handle click on search result item to redirect
    $('#search-results').on('click', '.search-result-item', function() {
        var url = $(this).data('url');
        if (url) {
            window.location.href = url;  // Redirect to the result page
        }
    });

    // Close search if clicking outside of search input or results
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#search-input, #search-results').length) {
            $('.search-overlay').removeClass('active');  // Hide the overlay
            $('#search-results').html('');  // Clear search results
            isSpinnerVisible = false;  // Reset spinner flag
        }
    });
});
