<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::all();
        return view("tasks.add");
    }

    public function showList(){
        $tasks=Task::all();
        return view("tasks.delete",["tasks"=>$tasks]);
    }
    
    public function search(Request $req){
        $searchby = $req->input('name');

    // Using Eloquent to search for records
    $tasks = Task::where('name', 'LIKE', "%$searchby%")->get();
        return view("tasks.search",["tasks"=>$tasks]);
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
        ],
        ['name.required'=>'Name is empty',]
        );
        
        $task=Task::create([
            'name'=>$request->get('name'),
        ]);
        
        return redirect()->route('home');

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
