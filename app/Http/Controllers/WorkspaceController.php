<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::all();
        return view('livewire.workspace.index', compact('workspaces'));
    }

    public function create()
    {
        return view('livewire.workspace.create');
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Workspace::create([
        'name' => $request->name,
        'user_id' => auth()->id(), // 🔥 هنا نحدد صاحب الـ Workspace
    ]);

    return redirect()->route('workspaces.index')->with('success', 'تم إنشاء الـ Workspace بنجاح ✅');
}


    public function edit($id)
    {
        $workspace = Workspace::findOrFail($id);
        return view('livewire.workspace.create', compact('workspace'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $workspace = Workspace::findOrFail($id);
        $workspace->update(['name' => $request->name]);
        return redirect()->route('workspaces.index')->with('success', 'Workspace updated successfully.');
    }
 public function show($id)
{
    $workspace = Workspace::with('boards')->findOrFail($id);
    return view('livewire.workspace.show', compact('workspace'));
}





    public function destroy($id)
    {
        Workspace::destroy($id);
        return redirect()->route('workspaces.index')->with('success', 'Workspace deleted successfully.');
    }
}

