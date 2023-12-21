$(document).ready(function() {
    // Set modal display to block when the "ADD TASK" button is clicked
    $('#addBtn').click(function() {
        $('#addTaskModal').show();
    });
});

$(document).on('click', '#closeaddModal', function () {
    $('#addTaskModal').hide();
});

$(document).ready(function() {
    // Handle click event for editBtn
    // Handle click event for editBtn
    $('.editBtn').on('click', function() {
        // Get the task ID associated with the clicked editBtn
        var taskId = $(this).data('task-id');
        $('#editTaskModal').show();

        // Assuming you have a route named 'getTaskDetails' to fetch task details
        $.ajax({
            url: '/todolist/taskDetails', // Replace with the actual route to fetch task details
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { taskId: taskId },
            success: function(data) {
                // Populate the modal with task details
                $('#editTaskModal #task_id').val(data.id);
                $('#editTaskModal #task_name').val(data.task_name);
                $('#editTaskModal #task_type').val(data.task_type);

                // Display the modal
                $('#editTaskModal').show();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Close edit task modal
    $('#closeEditModal').on('click', function() {
        $('#editTaskModal').hide();
    });
});

$(document).on('click', '#deleteBtn', function () {
    var taskId = $(this).data('task-id');
    $('#deleteTaskId').val(taskId);
    $('#deleteTaskModal').show();
});

// Add click event for closeDeleteModal to close delete confirmation modal
$(document).on('click', '#closeDeleteModal', function () {
    $('#deleteTaskModal').hide();
});

$(document).on('click', '#checkBtn', function () {
    var taskId = $(this).data('task-id');
    $('#finishTaskId').val(taskId);
});

$(document).ready(function() {
    // Assuming 'checkBtn' is the class associated with your finish button
    $('.checkBtn').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var taskId = $(this).data('task-id');

        // Assuming 'finishTaskForm' is the id associated with your finish task form
        $('#finishTaskForm').find('#finishTaskId').val(taskId);

        // Submit the form
        $('#finishTaskForm').submit();
    });
});

$(document).ready(function(){
    setTimeout(function(){
        $('.success-message').slideUp('normal');
    }, 1000);
});
