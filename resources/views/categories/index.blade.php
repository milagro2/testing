<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('categories.create') }}"
                        class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded border border-gray-300">Add
                        new category</a>

                    <br /><br />
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-black">Name</th>
                                {{-- <th class="px-4 py-2"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="border px-4 py-2 text-black">{{ $category->name }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-2 rounded">Edit</a>
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="bg-red-500 hover:bg-red-700 text-black font-bold py-1 px-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
