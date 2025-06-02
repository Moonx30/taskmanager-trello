@extends('layouts.app')

@section('title', 'Workspace: ' . $workspace->name)

@section('content')
<div class="min-h-screen bg-gray-100 px-8 py-10 text-gray-800">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold flex items-center gap-2">📋 {{ $workspace->name }}</h1>
    </div>

    {{-- Loop through boards --}}
    @foreach($workspace->boards as $board)
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">{{ $board->title }}</h2>

                <form method="POST" action="{{ route('columns.store', $board->id) }}" class="flex gap-2">
                    @csrf
                    <input type="text" name="name" placeholder="Column name"
                           class="border px-3 py-1 rounded text-sm text-gray-700 focus:outline-none focus:ring focus:ring-blue-300" required>
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 text-sm">+ Add Column</button>
                </form>
            </div>

            {{-- Columns --}}
            <div class="flex gap-6 overflow-x-auto pb-4">
                @forelse($board->columns as $column)
                    <div class="bg-white rounded shadow p-4 w-64 flex-shrink-0">
                        <h3 class="font-semibold text-gray-700 mb-3">{{ $column->name }}</h3>

                        <div class="flex justify-between items-center mb-2">
    <h2 class="text-lg font-semibold">{{ $column->name }}</h2>
    <div class="flex gap-2">
        <!-- زر التعديل -->
        <a href="{{ route('columns.edit', $column->id) }}"
           class="text-sm text-blue-500 hover:underline">Edit</a>

        <!-- زر الحذف -->
        <form method="POST" action="{{ route('columns.destroy', $column->id) }}"
              onsubmit="return confirm('Are you sure you want to delete this column?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-red-500 hover:underline">Delete</button>
        </form>
    </div>
</div>

                        {{-- Cards --}}
                        <div class="space-y-2">
                            @forelse($column->cards as $card)
                                <div class="bg-gray-100 p-2 rounded text-sm text-gray-800 shadow">
                                    {{ $card->title }}
                                </div>
                            @empty
                                <p class="text-sm text-gray-400 italic">No cards</p>
                            @endforelse
                        </div>
                        <div class="bg-gray-800 p-3 rounded shadow text-sm hover:shadow-md transition">
    <div class="flex justify-between items-center">
        <span>{{ $card->title }}</span>
        <div class="flex gap-2">
            <!-- زر التعديل -->
            <a href="{{ route('cards.edit', $card->id) }}"
               class="text-xs text-blue-400 hover:underline">Edit</a>

            <!-- زر الحذف -->
            <form method="POST" action="{{ route('cards.destroy', $card->id) }}"
                  onsubmit="return confirm('Are you sure you want to delete this card?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-red-400 hover:underline">Delete</button>
            </form>
        </div>
    </div>
</div>


                        {{-- Add Card --}}
                        <form method="POST" action="{{ route('cards.store') }}" class="mt-4 space-y-2">
                            @csrf
                            <input type="hidden" name="column_id" value="{{ $column->id }}">
                            <input type="text" name="title" placeholder="Card title"
                                   class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring focus:ring-blue-200" required>
                            <button type="submit"
                                    class="w-full bg-blue-500 text-white py-1.5 rounded hover:bg-blue-600 text-sm transition">
                                + Add Card
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-600 italic">No columns yet.</p>
                @endforelse
            </div>
        </div>
    @endforeach

</div>
@endsection
