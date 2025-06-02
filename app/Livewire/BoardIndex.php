<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardIndex extends Component
{
    protected $fillable = ['title', 'user_id', 'workspace_id'];

    #[Layout('layouts.app')]
    public function render()
{
    $workspaces = \App\Models\Workspace::with('boards')
        ->where('user_id', auth()->id())
        ->get();

    return view('livewire.board-index', [
        'workspaces' => $workspaces
    ]);
}

}


