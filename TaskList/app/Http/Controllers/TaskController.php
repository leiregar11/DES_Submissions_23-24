<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::all();
        return view("tasks.index",["tasks"=>$tasks]);
    }

    public function addTask(){
        return view("tasks.add",["texto"=>""]);
    }

    public function showList(){
        $tasks=Task::all();
        return view("tasks.list",["tasks"=>$tasks]);
    }
    
    public function search(Request $req){
        $searchby = $req->input('name');

    // Using Eloquent to search for records
    $tasks = Task::where('name', 'LIKE', "%$searchby%")->get();
        return view("tasks.search",["tasks"=>$tasks]);
    }
    
    public function store(Request $request){
        $taskName=$request->get("name");
        if(empty($taskName)){
            $texto="You cannot enter an empty task.";
            return view("tasks.add",["texto"=>$texto]);
        }else{
            $task=Task::create([
            'name'=>$request->get('name'),
            ]);
        }
        
        
        
        return view("tasks.add",["texto"=>""]);

    }

    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();

        // Optionally, you can redirect to the task list or return a response
        return redirect()->back();


    }
}
