<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="{{ asset('scripts/jquery.js') }}"></script>
    <script src="{{ asset('scripts/history.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/historyPage.css') }}">
    <title>TODO LIST | History</title>
</head>
<body>
    @if(session('success'))
    <div class="success-message">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    <div class="navHeader">
        <nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" name="logoutBtn" class="logoutButton" id="logoutBtn" value="LOGOUT">
            </form>
            <a class="backButton" href="{{ route('view') }}">BACK</a>
            <form action="{{ route('clearHistory') }}" method="POST" id="clearHistoryForm">
                @csrf
                <input type="submit" name="clearhistoryBtn" class="clearhistoryButton" id="clearhistoryBtn" value="CLEAR HISTORY">
            </form>
        </nav>
    </div>
    <div class="mainContent">

        <h1>HISTORY</h1>
        <div class="historyContainer">
            <table>
                <thead>
                    <th>Task Name</th>
                    <th>Task Type</th>
                    <th>Task Finished At</th>
                </thead>
            @foreach ($historyData as $history)
            <div class="historyItem">
                    <tbody>
                        <tr>
                            <input type="hidden" name="task_id" value="{{ $history->id }}">
                            <td><p>{{ $history->task_name }}</p></td>
                            <td><p>{{ $history->task_type }}</p></td>
                            <td><p>{{ (new DateTime($history->finished_at))->format('F j, Y \a\t g:i a') }}</p></td>
                        </tr>
                    </tbody>
            @endforeach
                </table>
            </div>
        </div>

    </div>

    <div id="confirmationModal" class="confirmationModal">
        <div class="confirmationModalContainer">
            <div class="modalContent">
                <h2>Confirm Action</h2>
                <p>Are you sure you want to clear the history?</p>
                <div class="confirmButtons">
                    <button id="confirmClearHistory">Yes</button>
                    <button id="cancelClearHistory">No</button>
                </div>

            </div>
        </div>
    </div>
</body>
</html>