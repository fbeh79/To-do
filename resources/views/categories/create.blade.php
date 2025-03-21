
@extends('layouts.master')
@section('content')
    <div style="text-align: center;color: darkgreen" class="header">Create Category</div>

    <form  action="{{route('category-store')}}" method="post"  style="border: #1a1d20;text-align: center">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <div class="error">@error('title'){{$message}} @enderror</div> <br>
        <input type="submit" value="Submit">

    <button class="back-button">back</button>
    </form>

@endsection
