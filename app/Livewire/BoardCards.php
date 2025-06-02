<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\Card;
use Livewire\Component;
use Illuminate\Support\Collection;

class BoardCards extends Component
{
    public Board $board;

    protected $listeners = ['updateCardOrder'];

    public function updateCardOrder($order, $group)
    {
        foreach ($order as $index => $cardId) {
            Card::where('id', $cardId)->update([
                'order' => $index,
                'column_id' => $group
            ]);
        }

        $this->board->refresh();
    }

    public function render()
    {
        $this->board->load('columns.cards');
        return view('livewire.board-cards');
    }
}
