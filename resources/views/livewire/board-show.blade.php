@extends('layouts.app')

@section('title', 'Board: ' . $board->title)

@section('content')
<div class="min-h-screen bg-[#0f172a] px-8 py-10 text-white">

    {{-- Header --}}
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold flex items-center gap-2">📋 {{ $board->title }}</h1>

        {{-- Add Column Form --}}
        <form method="POST" action="{{ route('columns.store', $board->id) }}" class="flex gap-2">
            @csrf
            {{-- <input type="text" name="name" placeholder="Column name"
                   class="bg-white/10 border border-gray-600 px-3 py-2 rounded text-sm text-white focus:outline-none focus:ring focus:ring-blue-400"
                   required>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold transition">
                ➕ Add Column
            </button> --}}
        </form>
    </div>

    {{-- Columns --}}
    <div class="flex gap-6 overflow-x-auto pb-6">
        @forelse ($board->columns as $column)
            <div class="bg-[#1e293b] rounded-xl p-4 w-72 flex-shrink-0 shadow-lg">
                <h2 class="text-md font-semibold uppercase mb-4 tracking-wide">{{ $column->name }}</h2>

             {{-- Cards --}}
<div class="space-y-2">
    @forelse ($column->cards as $card)
        <div class="bg-[#334155] p-3 rounded-lg text-sm hover:bg-[#475569] transition cursor-pointer relative">
            <div class="mb-1 font-semibold">{{ $card->title }}</div>

            <div class="absolute top-2 right-2 flex gap-2">
                {{-- Edit button (modal optional) --}}
                <a href="{{ route('cards.edit', $card->id) }}"
                   class="text-yellow-400 hover:text-yellow-300 text-xs">
                    ✏️
                </a>

                {{-- Delete button --}}
                <form method="POST" action="{{ route('cards.destroy', $card->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this card?')"
                            class="text-red-400 hover:text-red-300 text-xs">
                        🗑️
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-xs text-gray-400 italic">No cards yet.</p>
    @endforelse
</div>


                {{-- Add Card --}}
                <form method="POST" action="{{ route('cards.store') }}" class="mt-4 space-y-2">
                    @csrf
                    <input type="hidden" name="column_id" value="{{ $column->id }}">
                    <input type="text" name="title" placeholder="Card title"
                           class="w-full px-3 py-2 border border-gray-600 bg-white/10 rounded text-sm text-white focus:ring focus:ring-blue-300"
                           required>
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded text-sm font-semibold transition">
                        ➕ Add Card
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-300 text-sm italic">No columns added.</p>
        @endforelse

        {{-- Add New Column Box --}}
        <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl shadow-lg w-72 flex-shrink-0 border-2 border-dashed border-gray-500 text-white">
            <form method="POST" action="{{ route('columns.store', $board->id) }}">
                @csrf
                <input type="text" name="name" placeholder="Column name"
                       class="w-full mb-3 px-3 py-2 border border-gray-400 rounded text-sm bg-white/10 text-white focus:ring focus:ring-blue-300" required>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 text-sm font-semibold transition">
                    ➕ Add Column
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
