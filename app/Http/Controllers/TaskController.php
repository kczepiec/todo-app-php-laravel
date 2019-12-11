<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::check()) {
            $task = Task::all();
            return view('app.tasks.index', compact('task'));
        } else {
            return response('Unauthorized', 401)
                ->header('Content-Type', 'text/plain');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:1000'
        ]);

        $task = Task::create($request->all());
        $task->save();

        return redirect()->route('app.index')->with('message', 'Task created');

    }

    /**
     * Destroy a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->delete();

        return redirect()->route('app.index')->with('message', 'Task removed');
    }
    /**
     * Edit a resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        return view('app.tasks.edit', compact('task'));
    }
    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->update($request->all());

        return redirect()->route('app.index')->with('message', 'Task updated');
    }

    // API

    public function showTasks()
    {
        return response()->json(Task::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTask(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return response()->json(Task::all());
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteTask($id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->delete();

        return response()->json(Task::all());
    }
}
