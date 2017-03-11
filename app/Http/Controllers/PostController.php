<?php

namespace App\Http\Controllers;

use App\Post;
use App\Task;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, Task $task)
    {
        auth()->user()->post($task, $request->get('comments'));

        return redirect('posts/' . $post->id . '-' . $post->slug);
    }
}
