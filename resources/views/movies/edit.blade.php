<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Edit Movie") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto">
            <form method="POST" action="/movies/{{$movie->id}}">
                @method("PUT") @csrf

                <div class="mb-6">
                    <label
                        for="text"
                        class="text-sm font-medium text-gray-900 block mb-2"
                        >Name</label
                    >
                    <input
                        type="text"
                        id="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="name"
                        value="{{$movie->name}}"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="description"
                        class="text-sm font-medium text-gray-900 block mb-2"
                        >Description</label
                    >
                    <input
                        type="text"
                        id="description"
                        name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{$movie->description}}"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="rating"
                        class="text-sm font-medium text-gray-900 block mb-2"
                        >rating</label
                    >
                    <select name="rate" id="rate-select">
                        <option value="{{$movie->rating}}">
                            {{$movie->rating}}
                        </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
