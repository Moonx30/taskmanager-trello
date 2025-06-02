{{-- <div class="flex gap-6 overflow-x-auto pb-6">
    @foreach($board->columns as $column)
        <div class="bg-[#1e293b] rounded-xl p-4 w-72 flex-shrink-0 shadow-lg text-white">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-md font-semibold uppercase tracking-wide">{{ $column->name }}</h2>
                <form action="{{ route('columns.destroy', $column->id) }}" method="POST" onsubmit="return confirm('Delete this column?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-red-600 text-sm">🗑</button>
                </form>
            </div>

            {{-- Cards --}}
            {{-- <div
                x-data
                wire:sortable="updateCardOrder"
                wire:sortable-group="{{ $column->id }}"
                class="space-y-2 min-h-[40px]"
            >
                @foreach($column->cards as $card)
                    <div
                        wire:sortable.item="{{ $card->id }}"
                        wire:key="card-{{ $card->id }}"
                        wire:sortable.handle
                        class="bg-[#334155] p-3 rounded-lg text-sm hover:bg-[#475569] transition cursor-move flex justify-between items-center"
                    >
                        <span>{{ $card->title }}</span>
                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" onsubmit="return confirm('Delete this card?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 text-xs">✕</button>
                        </form>
                    </div>
                @endforeach
            </div> --}}

            {{-- Add Card --}}
            {{-- <form method="POST" action="{{ route('cards.store') }}" class="mt-4 space-y-2">
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
    @endforeach
</div> --}} 
