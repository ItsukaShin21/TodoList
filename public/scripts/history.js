$(document).ready(function() {
    // Assuming 'clearhistoryBtn' is the id associated with your clear history button
    $('#clearhistoryBtn').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the confirmation modal
        $('#confirmationModal').show();
    });

    // Handle cancel action
    $('#cancelClearHistory').on('click', function() {
        // Hide the confirmation modal
        $('#confirmationModal').hide();
    });

    // Handle confirm action
    $('#confirmClearHistory').on('click', function() {
        // Update the hidden field to indicate confirmation
        $('#confirmationStatus').val(1);

        // Submit the form
        $('#clearHistoryForm').submit();
    });
});

$(document).ready(function(){
    setTimeout(function(){
        $('.success-message').slideUp('normal');
    }, 1000);
});