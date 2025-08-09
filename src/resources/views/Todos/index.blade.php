<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="w-full max-w-lg mx-auto">

                        <!-- Add Todo Form -->
                        <form action="{{ route('todos.store') }}" method="POST" class="flex gap-2 mb-4">
                            @csrf
                            <input
                                type="text"
                                name="title"
                                placeholder="What needs to be done?"
                                class="flex-grow px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            >
                            <button
                                type="submit"
                                class="px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                            >
                                追加
                            </button>
                        </form>

                        <!-- Todo List -->
                        <ul class="space-y-2">
                            @foreach ($todos as $todo)
                                <li class="flex items-center justify-between p-3 bg-gray-100 rounded-lg dark:bg-gray-700">
                                    <div class="flex items-center">
                                        <!-- Update Todo Checkbox -->
                                        <form action="{{ route('todos.update', $todo) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input
                                                type="checkbox"
                                                {{ $todo->completed ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-600 dark:border-gray-500 cursor-pointer"
                                            >
                                        </form>
                                        <span class="ml-3 text-gray-800 dark:text-gray-200 {{ $todo->completed ? 'line-through text-gray-500 dark:text-gray-400' : '' }}">
                                            {{ $todo->title }}
                                        </span>
                                    </div>
                                    <!-- Delete Todo Button -->
                                    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                        >
                                            削除
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
