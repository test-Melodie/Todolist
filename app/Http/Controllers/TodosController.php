<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todos;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    public function liste()
    {
        $todos = Todos::all();
        return view("home", ["todos" => $todos]); 
    }

    public function saveTodo(Request $request)
    {
        $texte = $request->input('texte');
    
        if($texte){
            $todo = new Todos();
            $todo->texte = $texte;
            $todo->termine = 0;
            $todo->save();
        }
    
        return redirect()->route('todo.list');
    }

    public function markAsDone($id)
    {
        $todo  = Todos::find($id);
        if($todo){
            $todo->termine = 1;
            $todo->save();
        }
        return redirect("/");
    }
    public function deleteTodo($id){
        $todo  = Todos::find($id);
        if($todo){
            $todo->delete();
    } else {
        Session::flash('message', 'Erreur lors de la suppression de la tâche.');
    }

        return redirect("/");
    }
    public function about()
    {
        return view('a-propos');
    }
    public function categorie()
    {
        return $this->hasOne('App\Categorie');
    }
}