<?php

namespace App\Livewire\Board;

use Livewire\Component;
use App\Models\Workspace;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class Create extends Component
{
    public Workspace $workspace;
    public string $title = '';

    public function mount(Workspace $workspace)
    {
        $this->workspace = $workspace;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',

        ]);

        $this->workspace->boards()->create([
            'title' => $this->title,
              'user_id' => auth()->id(), 
        ]);

        return redirect()->route('workspaces.show', $this->workspace);
    }

    public function render()
    {
        return view('livewire.board.create');
    }
}

