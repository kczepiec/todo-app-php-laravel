<?php

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks', 'TaskController@showTasks');
Route::post('/tasks', 'TaskController@createTask');
Route::delete('/tasks/{id}', 'TaskController@deleteTask');

// Route::get('todo', function () {
//     return response()->json(Task::all(), 200);
// });
 
// Route::get('todo/task/{id}', function ($id) {
//     return response()->json(['taskId' => "{$id}"], 200);
// });
  
// Route::post('todo', function(Request $request) {
//     $task = new Task();
//     $task->name = $request->name;
//     $task->user_id = $request->user_id;
//     $task->save();
//     return response()->json($task, 201);
// });
 
// Route::put('todo/task/{id}', function() {
//     return  response()->json([
//             'message' => 'Update success'
//         ], 200);
// });
 
// Route::delete('todo/{id}',function() {
//     return  response()->json(null, 204);
// });