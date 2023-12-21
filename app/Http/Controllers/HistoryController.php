<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function displayhistoryData() {
        $historyData = History::all();

        return view('historyPage', [
            'historyData' => $historyData,
        ]);
    }

    public function clearHistory(Request $request) {
        // Delete all records from the History table
        History::truncate();

        $request->session()->flash('success', 'History Cleared Successfully');
        return redirect()->back();
    }
}
