@extends('layouts.master')
@section('content')
    <div style="text-align: center;color: darkgreen" class="todo-table">edit category
<br>
    <form  action="{{route('category.update',['category'=>$category->id])}}" method="post"  style="border: #1a1d20;text-align: center" class="todo-table">
        @csrf
        @method('put')
        edit:<input type="text" id="title"  value="{{$category->title}}" name="title"><br>

        <button class="back-button">edit</button>
        <a  href="{{route('Category.index')}}" class="back-button">back</a>
    </form>
    </div>

@endsection
