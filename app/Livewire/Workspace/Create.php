<?php

namespace App\Livewire\Workspace;

use Livewire\Component;
use App\Models\Workspace;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Create extends Component
{
    public $name;

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Workspace::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', 'تم الإنشاء بنجاح ✅');
        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.workspace.create');
    }
}

