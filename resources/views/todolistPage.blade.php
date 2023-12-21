<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="{{ asset('scripts/jquery.js') }}"></script>
    <script src="{{ asset('scripts/todolistscript.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/todolistPage.css') }}">
    <title>TODO LIST | Home</title>
</head>
<body>
    @if(session('success'))
    <div class="success-message">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @error('task_name')
    <div class="error-message">
        <p>{{ $error }}</p>
    </div>
    @enderror
    <div class="navHeader">
        <nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" name="logoutBtn" class="logoutButton" id="logoutBtn" value="LOGOUT">
            </form>
            <a class="backButton" href="{{ route('displayHistory') }}">HISTORY</a>
        </nav>
    </div>

    <div class="mainContent">

    <div class="tasksContainer">
        <h1>TASKS</h1>
        <button class=" addBtn" id="addBtn">ADD</button>

        <div class="taskitemContainer">
            
            <div class="taskitemContents">
                @foreach ($tasksData as $task)
                <div class="taskItem">
                    <form method="POST" action="{{ route('view') }}">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <p>{{ $task->task_name }}</p>
                        <i class="ri-pencil-fill editBtn" data-task-id="{{ $task->id }}" id="editBtn"></i>
                        <i class="ri-delete-bin-2-fill" data-task-id="{{ $task->id }}" id="deleteBtn"></i>
                    </form>
                    <form method="POST" action="{{ route('finishTask') }}" id="finishTaskForm">
                        @csrf
                        <input type="hidden" name="task_id" id="finishTaskId" value="{{ $task->id }}">
                        <i class="ri-check-fill checkBtn" data-task-id="{{ $task->id }}" id="checkBtn"></i>
                    </form>
                </div>
                @endforeach
            </div>

        </div>

    </div>

    </div>

    <div class="addTaskModal" id="addTaskModal">
        <div class="addTaskModalContainer">
            <div class="modalContent">
                <h2>ADD TASK</h2>
                <form method="POST" action="{{ route('addTask') }}">
                    @csrf
                    <input type="text" name="task_name" class="addtaskInput" id="task_name">
                    <select name="task_type" class="addtaskInput" id="task_type">
                        <option value="">Select Type</option>
                        <option value="Home">Home</option>
                        <option value="School">School</option>
                        <option value="Self">Self</option>
                        <option value="Work">Work</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="submit" name="addtaskBtn" class="addtaskButton" id="addtaskBtn" value="ADD TASK">
                    <input type="button" name="closeaddModal" class="closeaddModal" id="closeaddModal" value="CANCEL">
                </form>
            </div>
        </div>
    </div>

    <div class="editTaskModal" id="editTaskModal">
    <div class="editTaskModalContainer">
        <div class="modalContent">
            <h2>EDIT TASK</h2>
            <form method="POST" action="{{ route('updateTask') }}">
                @csrf
                <input type="hidden" name="task_id" id="task_id">
                <input type="text" name="task_name" class="edittaskInput" id="task_name">
                <select name="task_type" class="edittaskInput" id="task_type">
                    <option value="">Select Type</option>
                    <option value="Home">Home</option>
                    <option value="School">School</option>
                    <option value="Self">Self</option>
                    <option value="Work">Work</option>
                    <option value="Other">Other</option>
                </select>
                <input type="submit" name="edittaskBtn" class="edittaskButton" id="edittaskBtn" value="UPDATE TASK">
                <input type="button" name="closeEditModal" class="closeEditModal" id="closeEditModal" value="CANCEL">
            </form>
        </div>
    </div>
</div>

<div class="deleteTaskModal" id="deleteTaskModal">
    <div class="deleteTaskModalContainer">
        <div class="modalContent">
            <h2>DELETE TASK</h2>
            <p>Are you sure you want to delete this task?</p>
            <form method="POST" action="{{ route('deleteTask') }}" id="deleteTaskForm">
                @csrf
                <input type="hidden" name="task_id" id="deleteTaskId">
                <input type="submit" name="deleteTaskBtn" class="deleteTaskButton" id="deleteTaskBtn" value="YES">
                <input type="button" name="closeDeleteModal" class="closeDeleteModal" id="closeDeleteModal" value="NO">
            </form>
        </div>
    </div>
</div>

<footer>
    <p>All rights reserve 2023</p>
</footer>
</body>
</html>