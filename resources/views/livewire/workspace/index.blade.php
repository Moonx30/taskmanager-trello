@extends('layouts.app')

@section('title', 'Workspace List')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-100 px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-2">
        📁 Workspace List
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($workspaces as $workspace)
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-bold text-gray-700">{{ $workspace->name }}</h2>
                    <a href="{{ route('boards.create', $workspace->id) }}"
                       class="text-sm text-blue-500 hover:underline">+ add board</a>
                </div>

                <p class="text-sm text-gray-500 mb-1">The boards:</p>
                @forelse ($workspace->boards as $board)
                    <div class="bg-blue-100 px-3 py-2 rounded mb-2 flex justify-between items-center">
                        <span class="text-gray-800 text-sm">{{ $board->title }}</span>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 italic">No boards</p>
                @endforelse

                <div class="flex justify-between mt-4">
                    <a href="{{ route('workspaces.edit', $workspace->id) }}"
                       class="px-4 py-1 text-white bg-green-500 hover:bg-green-600 rounded text-sm">Edit</a>

                    <form method="POST" action="{{ route('workspaces.destroy', $workspace->id) }}"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-1 text-white bg-red-500 hover:bg-red-600 rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        {{-- Add New Workspace --}}
        <a href="{{ route('workspaces.create') }}"
           class="border-dashed border-2 border-gray-400 rounded-xl flex items-center justify-center text-gray-500 hover:text-blue-600 transition h-48 text-center text-sm">
            + New Workspace
        </a>
    </div>
</div>
@endsection
