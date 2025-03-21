
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .completed-status {
            display: none; /* Hide status by default */
            margin-left: 5px;
            color: green;
            font-weight: bold;
        }
        .show-button:focus + .completed-status {
            display: inline;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Add shadow */
        }
        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            background-color: #f8f9fa; /* Slightly grey background for header */
        }

        .btn-back {
            background-color: #343a40; /* Darker button */
            color: white;
        }

        .btn-back:hover {
            background-color: #23272b; /* Darker on hover */
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

    </style>
</head>
<body>

<form method="post" action="{{route('todo-update',['todo'=>$todo->id])}}">
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Todo</h4>
            <a href="{{route('todo-index')}}" class="btn btn-sm btn-back">back</a>

        </div>
        <div class="card-body">
            <div class="mb-3">
                 <img  class="rounded" width="60"  src="{{asset('images/'.$todo->image)}}" alt="">
            </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" value="{{$todo->title}}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" value="{{$todo->category->title}}" readonly>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" value="{{$todo->status ?'complete' :'doing...'}}" readonly>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input  class="form-control" value="{{$todo->description}}" id="description"  readonly >
            </div>
            <div class="mt-3 d-flex gap-2">
                <a   class="btn btn-primary" href="{{route('todo-edit',['todo'=>$todo->id])}}"> Edit</a>
                <a class="btn btn-danger" href="{{route('todo-destroy',['todo'=>$todo->id])}}">Delete</a>
            </div>

        </div>
    </div>
</div>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
