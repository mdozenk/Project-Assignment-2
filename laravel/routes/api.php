<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('tasks', 'TaskController@createTask');
Route::get('tasks', 'TaskController@showTasks');
Route::put('tasks/{taskId}', 'TaskController@updateTask');
Route::delete('tasks/{taskId}', 'TaskController@deleteTask');
Route::post('tasks/{taskId}/assign', 'TaskController@assignTask');
Route::delete('tasks/{taskId}/unassign', 'TaskController@unassignTask');
Route::post('tasks/{taskId}/subtasks', 'TaskController@addSubtask');
Route::delete('tasks/{taskId}/subtasks/{subtaskId}', 'TaskController@deleteSubtask');

