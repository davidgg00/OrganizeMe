<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $this->middleware('auth');
    }

    public function create($content)
    {
        $task = new Task();
        $task->user_id = \Auth::user()->id;
        $task->content = $content;
        $task->done = 0;

        $task->save();
        echo $task->id;
    }

    public function done($id)
    {
        $task = Task::find($id);

        $task->done = 1;

        $task->update();
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();
    }
}
