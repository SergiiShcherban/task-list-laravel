@extends('layouts.app')

@section('title', 'Single task')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray-600 underline "><- Go back</a>
    </div>
    <div>
        <p class="mb-4">Status:
            @if ($task->completed)
                <span class="font-medium text-green-500">Completed</span>
            @else
                <span class="font-medium text-red-500">Not completed</span>
            @endif
        </p>
        <div>
            <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title">Task</label>
                    <input type="text" name="title" id="title" value="{{ $task->title }}" class="px-3 py-2 text-gray-700 placeholder-gray-400 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                        @class(['border-red-500' => $errors->has('title')])>
                    @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Edit</button>
                </div>
            </form>

            <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                @csrf
                @method('DELETE')
                <div class="flex items-center gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <p class="mt-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} | Updated {{ $task->updated_at->diffForHumans() }}</p>
@endsection
