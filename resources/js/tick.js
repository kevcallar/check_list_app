$(document).ready(function() {
    // Add listener for checkbox change event
    $('.form-check-input').on('change', function() {
        var itemId = $(this).data('item-id');
        var newState = $(this).is(':checked') ? 1 : 0;

        console.log(itemId);
        console.log(newState);

        // AJAX request to update item state
        $.ajax({
            url: '/api/update-state/' + itemId,
            type: 'PUT',
            data: { state: newState },
            success: function(response) {
                // Handle success
                console.log(response);
                location.reload();
                if (newState === 1) {
                    $('#item_' + itemId).addClass('crossed-out');
                } else {
                    $('#item_' + itemId).removeClass('crossed-out');
                }// Reload page after successful update
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        }).done(function(data) {
            console.log(data);
        }).fail(function(jqXHR) {
            console.log(jqXHR.statusText);
        });
    });
});



