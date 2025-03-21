<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Storage;

class TodoController extends Controller
{
    public function index()
    {
        $task=Todo::paginate(3 );
        return view('todos.todo',compact('task'));
    }
    public function create(){
        $category=category::all();

     return view('task-todo.create',compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName;

            // ذخیره فایل در پوشه public/images
            $image->move(public_path('images'), $imageName);

            // ذخیره اطلاعات در دیتابیس با مسیر فایل
            Todo::create([
                'image' => $imagePath, // ذخیره مسیر کامل فایل
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);

            return redirect()->back()->with('success', 'اطلاعات و عکس با موفقیت ذخیره شد.');
        }

        return redirect()->back()->with('error', 'آپلود عکس با خطا مواجه شد.');
    }
    public function show(Todo $todo){

        return view('task-todo.show', compact('todo'));
    }

    public function complete(Todo $todo)
    {
        $todo->update([
            'status'=>1
        ]);
        return redirect()->route('todo-index');
    }
   public function edit(Todo $todo)
   {
       $category=category::all();
       return view('task-todo.edit',compact('todo','category'));
   }

    public function update(Request $request, $todo)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|integer', // Updated validation rule
        ]);

        $todoModel = Todo::findOrFail($todo);

        if ($request->hasFile('image')) {
            if ($todoModel->image) {
                Storage::delete('/images/' . $todoModel->image);
            }
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('/images', $filename);
            $todoModel->image = $filename;
        }

        $todoModel->title = $request->title;
        $todoModel->description = $request->description;
        $todoModel->category_id = $request->category_id; // Updated field name
        $todoModel->save();

        return redirect()->route('todo-index');

}
    public function destroy(Todo  $todo)
    {
      $todo->delete();
        return redirect()->route('todo-index');
    }
}
