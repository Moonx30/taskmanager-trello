<?php


namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
 public function show($id)
{
    $board = Board::with('columns.cards')->findOrFail($id);
   return view('livewire.board-show', compact('board'));
}





    public function destroy(Board $board)
    {
        if ($board->user_id !== auth()->id()) {
            abort(403);
        }

        $board->delete();

        return redirect()->back()->with('message', 'تم حذف البورد بنجاح ✅');
    }
}

