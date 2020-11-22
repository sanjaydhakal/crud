<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        return view('todo_create');
    }

    
    public function store(Request $request)
    {
        // return $request->input('name');
        $res = new Todo;
        $res->name=$request->input('name');
        $res->save();

        $request->session()->flash('msg','Data Submitted Sucesfully');
        return redirect('todo_show');
    }

    public function show(todo $todo)
    {
        return view('todo_show')->with('todoArr',Todo::all());
    }

    
    public function edit(todo $todo,$id)
    {
        return view('todo_edit')->with('todoArr',Todo::find($id));

    }

   
    public function update(Request $request, todo $todo)
    {
        $res =Todo::find($request->id);
        $res->name=$request->input('name');
        $res->save();

        $request->session()->flash('msg','Data Updated');
        return redirect('todo_show');
    }

    
    public function destroy(todo $todo, $id)
    {
        Todo::destroy(array('id',$id));

        return redirect('todo_show');
    }
}
