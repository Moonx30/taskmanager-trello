<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Create New Board in "{{ $workspace->name }}"</h1>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Board Title</label>
            <input type="text" wire:model.defer="title"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Save
            </button>
        </div>
    </form>
</div>
