<div>
    @if (session()->has('message'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
        {{ session('message') }}
    </div>
@endif

    <h1 class="text-2xl font-bold mb-6">Your Workspaces</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($workspaces as $workspace)
            <div class="bg-white rounded shadow p-4">

                {{-- العنوان والرابط وزر الحذف --}}
                <div class="flex justify-between items-center mb-2">
                    <a href="{{ route('workspaces.show', $workspace->id) }}"
                       class="font-semibold text-lg hover:underline">
                        {{ $workspace->name }}
                    </a>

                    {{-- زر الحذف --}}
                    <form method="POST"
                          action="{{ route('workspaces.destroy', $workspace->id) }}"
                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الـ Workspace؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-500 text-sm hover:underline">
                            🗑 Delete
                        </button>
                    </form>
                </div>

                <p class="text-sm text-gray-500">Boards:</p>
                <ul class="mt-2 space-y-1">
                    @forelse ($workspace->boards as $board)
                        <li>
                            <a href="{{ route('boards.show', $board->id) }}"
                               class="text-gray-700 hover:underline">
                                {{ $board->title }}
                            </a>
                        </li>
                    @empty
                        <li class="text-sm text-gray-400">No boards yet.</li>
                    @endforelse
                </ul>
            </div>
        @endforeach

        {{-- زر إضافة Workspace --}}
        <a href="{{ route('workspaces.create') }}"
           class="bg-white border-dashed border-2 border-gray-300 rounded flex items-center justify-center text-gray-500 hover:text-blue-600 transition h-36">
            <span class="text-lg">+ Add Workspace</span>
        </a>
    </div>
</div>
