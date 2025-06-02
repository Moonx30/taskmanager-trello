@extends('layouts.app')

@section('title', 'Trello-style Board')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl text-white font-bold mb-6">📋 Project Board</h1>

    <div class="flex space-x-6 overflow-x-auto pb-4">
        @foreach ($columns as $column)
            <div class="bg-[#13131e] text-white rounded-xl p-4 w-72 shadow-lg flex-shrink-0">
                <h2 class="text-lg font-semibold mb-4 uppercase tracking-wide">{{ $column->name }}</h2>

                <div class="space-y-3">
                    @forelse ($column->cards as $card)
                        <div class="bg-[#1f1f2d] p-3 rounded shadow hover:shadow-md transition text-sm">
                            {{ $card->title }}
                        </div>
                    @empty
                        <p class="text-sm text-gray-400 italic">No cards.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('cards.store') }}" class="mt-4 space-y-2">
                    @csrf
                    <input type="hidden" name="column_id" value="{{ $column->id }}">
                    <input type="text" name="title" placeholder="Add new card"
                           class="w-full px-3 py-2 bg-[#2b2b3d] border border-gray-600 rounded text-sm text-white" required>
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded text-sm font-semibold">
                        + Add Card
                    </button>
                </form>
            </div>
        @endforeach

        <div class="bg-white/10 border-2 border-dashed border-gray-500 rounded-xl p-4 w-72 flex-shrink-0 text-white">
            <form method="POST" action="{{ route('columns.store', $board->id ?? 1) }}">
                @csrf
                <input type="text" name="name" placeholder="New column name"
                       class="w-full mb-3 px-3 py-2 border border-gray-400 rounded bg-white/10 text-sm text-white" required>
                <button type="submit"
                        class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 text-sm">
                    + Add Column
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
