<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    /**
     * تخزين عمود جديد.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        Column::create($validated);

        return redirect()->back()->with('message', 'تم إنشاء العمود بنجاح.');
    }

    /**
     * عرض نموذج التعديل.
     */
    public function edit($id)
{
    $column = Column::findOrFail($id);
    return view('columns.edit', compact('column'));
}

    /**
     * حفظ التعديلات.
     */
    public function update(Request $request, $id)
{
    $column = Column::findOrFail($id);
    $column->update($request->validate([
        'name' => 'required|string|max:255',
    ]));
    return redirect()->route('boards.show', $column->board_id)->with('success', 'Column updated successfully.');
}

    /**
     * حذف العمود.
     */
    public function destroy($id)
{
    $column = Column::findOrFail($id);
    $column->delete();
    return redirect()->route('boards.show', $column->board_id)->with('success', 'Column deleted successfully.');
}




}
