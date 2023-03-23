<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    //Listar
    public function index()
    {
        $toDoLists = ToDoList::all();
        return view('home', compact('toDoLists'));
    }

    //Salvar dados
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required'
        ]);

        ToDoList::create($data);
        return back();
    }

    //Deletar dados
    public function destroy(ToDoList $toDoList)
    {
        $toDoList->delete();
        return back();
    }

    //Atualizar status
    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        ToDoList::where('id', $request->id)->update(['status' => 1]);
        return back();
    }

}
