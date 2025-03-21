@extends('layouts.master')
@section('content')
<table class="todo-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                    <th></th><a href="{{route('category.create')}}">create</a>

                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>

                        <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-sm btn-success">edit</a>
                        <br>
                        <form action="{{route('category.delete',['category'=>$category->id])}}" method="post">
                            @method('DELETE')
                        @csrf
                            <button class="btn btn-sm btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
@endforeach
@endsection
