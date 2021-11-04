<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                    href="/add"
                >
                    Create
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container flex flex-wrap">
                    <table class="w-full table-auto rounded-sm">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    Movie
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    Description
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    Rating
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr class="border-gray-300 even:bg-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-sm"
                                >
                                    {{ $movie->name }}
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-sm"
                                >
                                    {{ $movie->description }}
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-sm"
                                >
                                    {{ $movie->rating }}
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-sm flex"
                                >
                                    <span>
                                        <a
                                            class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                                            href="/movies/{{$movie->id}}/edit"
                                        >
                                            Edit
                                        </a>
                                    </span>
                                    <span>
                                        <form
                                            action="/movies/{{$movie->id}}"
                                            method="POST"
                                        >
                                            @method("DELETE") @csrf
                                            <button
                                                type="submit"
                                                class="button rounded bg-red-900 py-2 px-2 ml-2"
                                            >
                                                X
                                            </button>
                                        </form>
                                    </span>
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
