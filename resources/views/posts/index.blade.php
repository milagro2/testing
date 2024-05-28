<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('posts.create') }}"
                        class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded border border-gray-300">Voeg
                        taak toe</a>

                    <br /><br />
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-black">Begintijd</th>
                                <th class="px-4 py-2 text-black">Eindtijd</th>
                                <th class="px-4 py-2 text-black">Taak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border px-4 py-2 text-black">{{ $post->begintijd }}</td>
                                    <td class="border px-4 py-2 text-black">{{ $post->eindtijd }}</td>
                                    <td class="border px-4 py-2 text-black">{{ $post->category->name }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-2 rounded">Bewerk</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="bg-red-500 hover:bg-red-700 text-black font-bold py-1 px-2 rounded">Verwijder</button>
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
