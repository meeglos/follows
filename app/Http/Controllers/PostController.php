<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, Task $task)
    {
//        dd(auth()->user()->post($task, $request->get('comments')));
        auth()->user()->post($task, $request->get('comments'));

        return redirect('tasks/' . $task->id . '-' . $task->slug);
    }
}
