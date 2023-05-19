<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia; 
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Before to render the CRUD is neccesary yo get the user ID
        $user_id = Auth::user()->id;

        // Query to Task DB where user_id is current user 
        $query = Task::where('User_id',$user_id)->get();

        // Go to the CRUD with user id and its own tasks
        return Inertia::render('Dashboard',[
            'tasks'     => $query,     
            'user_id'   => $user_id,
        ]);

        
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate data before create a new task
        $request->validate([
            'Name'      => 'required|string|max:100',   // Max 100 characters, however in the TaskManager.vue there is the same restriction
            'Detail'    => 'required|string|max:500',   // Max 500 characters, however in the TaskManager.vue there is the same restriction
            'Deadline'  => 'required',
            'User_id'   => 'required',
            'Completed' => 'required',
        ]);

        // save a new student into DB 
        Task::create([
            'Name'      => $request['Name'],
            'Detail'    => $request['Detail'],
            'Deadline'  => $request['Deadline'],
            'User_id'   => $request['User_id'],
            'Completed' => $request['Completed'],
        ]);

        // go back the CRUD view => Dashoboard.vue
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Another option to get the data
        $Data = request();     
        
        // Validate data before create a new task
        $Data->validate([
            'Name'      => 'required',
            'Detail'    => 'required',
            'Deadline'  => 'required',
            'User_id'   => 'required',
            'Completed' => 'required',
        ]);


        // Update the Task into the DB
        $task->update($request->request->all());

        // go back the CRUD view => Dashoboard.vue
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
