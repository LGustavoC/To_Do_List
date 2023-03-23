<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toDoList = ToDoList::all();
        return view('home', compact('toDoList'));
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
        $data = $request->validate([
            'content' => 'required'
        ]);

        ToDoList::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDoList $toDoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDoList $toDoList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDoList $toDoList)
    {
        $toDoList->delete();
        return back();
    }
}
