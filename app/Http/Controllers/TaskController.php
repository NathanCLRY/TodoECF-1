<?php

namespace App\Http\Controllers;

use index;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('lister', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation of the data of the form
        $request->validate([
            'tache' => 'required'
        ]);
        //Creation of an instance
        $task = new Task;
        //Affectation of the data 
        $task->user_id = auth()->user()->id;
        $task->tache = $request->tache;
        $task->state = 0;
        //Save the data
        $task->save();
        return to_route('home')->with('valid', 'La tâche a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task)
    {
        //Update of the state
        if ($task->state == 0) {
            $task->update(['state' => 1]);
        } else {
            $task->update(['state' => 0]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        //Task::destroy($id);
        return back();
        //
    }

    public function destroyIfRealised()
    {
        Task::where('user_id', auth()->user()->id)
            ->where('state', 1)
            ->delete();
        return back();
    }

    public function destroyAll()
    {
        Task::where('user_id', auth()->user()->id)
            ->delete();
        return back();
    }
}
