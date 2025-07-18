@extends('layouts.app')

@section('title', 'Edit Card')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Card</h1>
    <form method="POST" action="{{ route('cards.update', $card->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Card Title</label>
            <input type="text" name="title" value="{{ old('title', $card->title) }}"
                   class="w-full px-3 py-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
