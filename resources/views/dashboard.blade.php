<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow"
                    href="{{ route('movies.create') }}"
                >
                    Create
                </a>
            </div>
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-wrap">
                    <table class="w-full table-auto rounded-sm">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium w-1/4"
                                >
                                    Movie
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium w-1/2"
                                >
                                    Description
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium w-1/4"
                                >
                                    Rating
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium w-1/4"
                                >
                                    actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr class="border-gray-300 even:bg-gray-300">
                                <td
                                    class="px-4 py-4 border-gray-300 text-sm w-1/4"
                                >
                                    {{ $movie->name }}
                                </td>
                                <td
                                    class="px-4 py-4 border-gray-300 text-sm w-1/2"
                                >
                                    {{ $movie->description }}
                                </td>
                                <td
                                    class="px-4 py-4 border-gray-300 text-sm w-1/4"
                                >
                                    {{ $movie->rating }}
                                </td>
                                <td
                                    class="px-1 border-gray-300 text-sm py-4 flex justify-center items-center w-1/4"
                                >
                                    <span>
                                        <a
                                            class="bg-blue-500 tracking-wide text-white px-2 py-2 inline-block shadow-lg rounded hover:shadow"
                                            href="{{
                                                route('movies.edit', $movie)
                                            }}"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <form
                                            action="{{
                                                route('movies.destroy', $movie)
                                            }}"
                                            method="POST"
                                        >
                                            @method("DELETE") @csrf
                                            <button
                                                type="submit"
                                                class="button rounded bg-red-600 py-2 px-2 ml-2 text-white"
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
            {{ $movies->links() }}
        </div>
    </div>
</x-app-layout>
