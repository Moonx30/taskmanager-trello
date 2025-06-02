<?php

namespace App\Livewire\Workspace;

use Livewire\Component;
use App\Models\Workspace;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{

    public function render()
    {
        $workspaces = Workspace::with('boards')->where('user_id', auth()->id())->get();
        return view('livewire.workspace.index', compact('workspaces'));
    }
}
