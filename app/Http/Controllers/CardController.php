<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{


public function index()
{
    $cards = Card::with('column')->latest()->get();
    return view('cards.index', compact('cards'));
}



    public function store(Request $request)
{
    $request->validate([
        'column_id' => 'required|exists:columns,id',
        'title' => 'required|string|max:255',

]);
  $userId = Auth::id();

      if (!$userId) {
    abort(403, 'User not authenticated.');



    Card::create([
    'column_id' => $request->column_id,
    'title' => $request->title,
    'order' => 1,
    'user_id' => $userId, // ✅ مضمون 100%
]);


    return back()->with('message', 'Card created successfully.');
}

}
public function edit($id)
{
    $card = Card::findOrFail($id);
    return view('cards.edit', compact('card'));
}

public function update(Request $request, $id)
{
    $card = Card::findOrFail($id);
    $card->update($request->validate([
        'title' => 'required|string|max:255',
    ]));
    return redirect()->route('boards.show', $card->column->board_id)->with('success', 'Card updated successfully.');
}

public function destroy($id)
{
    $card = Card::findOrFail($id);
    $card->delete();
    return redirect()->route('boards.show', $card->column->board_id)->with('success', 'Card deleted successfully.');
}

}
