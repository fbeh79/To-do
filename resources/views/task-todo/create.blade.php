@include('layouts.header')
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App - Create Todo</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        .container {
            width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 2px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
            margin-right: 10px;
        }
        .back-button {
            float: right;
            background-color: #333;
        }
    </style>
</head>
<body>
<div class="container">



    <form method="post" action="{{route('todo-store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
            <div class="error">@error('image') {{$message}} @enderror</div>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
            <div class="error">@error('title') {{$message}} @enderror</div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category">
                @foreach($category as $cate)
                <option value="{{$cate->id}}">{{$cate->title}}</option>
                @endforeach
            </select>
            <div class="error">@error('category') {{$message}} @enderror</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
            <div class="error">@error('description') {{$message}} @enderror</div>
        </div>
        <button type="submit">Submit</button>
        <a href="{{route('todo-index')}}" type="button" class="btn-danger">back</a>
    </form>
</div>
</body>
</html>
