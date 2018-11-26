<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function _construct(){
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        return Task::where('user_id', auth()->id())->get();
    }

    

   
    public function store(Request $request)
    {
        //return $request->all();
        $task = new Task();
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->user_id = auth()->id();
        $task->save();

        return $task;
    }

   

    
    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->save();

        return $task;
    }

    
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

       
    }
}
