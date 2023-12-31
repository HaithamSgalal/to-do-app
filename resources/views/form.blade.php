@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')

@endsection

@section('content')

    <form method="post" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ isset($task->title) ? $task->title : old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')]) cols="30" rows="5">
                {{ isset($task->description) ? $task->description : old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) cols="30" rows="10">
                {{ isset($task->long_description) ? $task->long_description : old('long_description') }}</textarea>
            @error('long_description')
                <p class="error"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a class="btn" href="{{ route('task.index') }}">Cancel</a>
        </div>
    </form>

@endsection
