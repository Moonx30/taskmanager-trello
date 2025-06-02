<?php
namespace App\Livewire\Workspace;

use Livewire\Component;
use App\Models\Workspace;
use Livewire\Attributes\Layout;

 #[Layout('layouts.app')]
class Show extends Component
{


    public Workspace $workspace;

    public function mount(Workspace $workspace)
    {
        $this->workspace = $workspace->load('boards');
    }

    public function render()
    {
        return view('livewire.workspace.show');
    }
}
