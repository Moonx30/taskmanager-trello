
@extends('layouts.app')

@section('title', isset($workspace) ? 'تعديل Workspace' : 'إنشاء Workspace جديد')

@section('content')


<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        {{ isset($workspace) ? 'تعديل الـ Workspace' : 'إنشاء Workspace جديد' }}
    </h2>

    <form method="POST" action="{{ isset($workspace) ? route('workspaces.update', $workspace->id) : route('workspaces.store') }}">
        @csrf
        @if(isset($workspace))
            @method('PUT')
        @endif

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">اسم Workspace</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $workspace->name ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="مثل: فريق التصميم">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('workspaces.index') }}"
               class="text-sm text-gray-500 hover:underline">⬅️ العودة للقائمة</a>

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition-all">
                {{ isset($workspace) ? '💾 تحديث' : '➕ إنشاء' }}
            </button>
        </div>
    </form>
</div>
@endsection

