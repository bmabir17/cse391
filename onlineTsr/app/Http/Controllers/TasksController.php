<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TasksController extends Controller
{
    //
    public function index(){
        //$hobbies= Task::all();
        $tasks=Task::inComplete()->get();
        //$hobbies=DB::table('tasks')->get();
        //dd($tasks);
        return view('tasks.index',compact('tasks'));

    }
    public function show(Task $id){ //model-controller binding
        //$tasks=DB::table('tasks')->find($id);
        //$tasks=Task::find($id);
        //dd($tasks);
        return view('tasks.view',compact('id'));
    }
}
