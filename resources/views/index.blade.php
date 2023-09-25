@extends('layouts.app')

@section('title', 'The list of tasks')

@section('styles')
    <style>
        .show-tick {
            display: inline;
        }

        .hide-tick {
            display: none;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}" class="flex items-center justify-between">
        @csrf
        <div class="flex-1 mr-2">
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none">
            @error('title')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">Add Task</button>
        </div>
    </form>
    <div class="mt-4">
        @forelse($tasks as $task)
            <div class="mt-2 flex items-center justify-between">
                <div class="mr-4">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class(['font-medium text-gray-700', 'line-through' => $task->completed])>{{ $task->title }}</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                        @csrf
                        @method('PUT')
                        <label for="toggleComplete" class="cursor-pointer">
                            <input type="checkbox" id="toggleComplete" name="completed" {{ $task->completed ? 'checked' : '' }} class="hidden">
                            <button type="submit" class="border border-gray-300 w-6 h-6 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-green-500">
                                <svg @class(['w-4 h-4 m-auto text-green-500',  $task->completed ? 'show-tick' : 'hidden']) xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 m-auto text-green-500" id="checkmark" display="none">
                                    <path fill-rule="evenodd" d="M9.293 13.293a1 1 0 0 1-1.414 0L5 10.414a1 1 0 1 1 1.414-1.414L8 11.586l4.293-4.293a1 1 0 1 1 1.414 1.414L9.414 13.293a1 1 0 0 1-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </label>
                    </form>
                </div>
            </div>
        @empty
            <div>There are no tasks!</div>
        @endforelse
    </div>

    @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
