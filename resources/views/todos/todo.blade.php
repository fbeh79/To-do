Certainly, let's add pagination to your code. Here's the modified version with pagination included:

PHP

@extends('layouts.master')

@section('content')
    <table class="todo-table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Action</th>
            <th><a href="{{ route('todo.create') }}">create</a></th>
        </tr>
        </thead>

        <tbody>
        @foreach ($task as $todos)
            <tr>
                <td>
                    <img src="{{asset('storage/'.$todos->image) }}" class="rounded" width="90" alt="image">
                </td>
                <td>{{ $todos->title }}</td>
                <td>
                    @if ($todos->category)
                        {{ $todos->category->title }}
                    @else
                        دسته بندی ندارد
                    @endif
                </td>
                <td>
                    <a href="{{ route('todo-show', ['todo' => $todos->id]) }}" class="show-button">Show</a>
                    @if ($todos->status)
                        <span class="success">Completed</span>
                    @else
                        <a href="{{ route('todo-complete', ['todo' => $todos->id]) }}" class="button-blue">Done?</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $task->links() }}
@endsection
