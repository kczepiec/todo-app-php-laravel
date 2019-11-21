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
            $task = Task::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::user()->id]
            ])->firstOrFail();
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
        $task = new Task();
        $task->name = $request->name;
        if (Auth::check()) {
            $task->user_id = Auth::user()->id;
        } else {
            return response('Bad request', 400)
                ->header('Content-Type', 'text/plain');
        }
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
}
