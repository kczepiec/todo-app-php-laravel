<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::check()) {
            $authUserId = Auth::user()->id;
            $tasks = Task::where('user_id', $authUserId)->orderBy('created_at', 'DESC')->get();

            return view('app.index', compact('tasks'));
        }

        return view('app.index');
    }
}
