<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Task;
use App\Models\User;
use Auth;

use App\Logic\User\UserRepository;

class TasksController extends Controller
{

    protected $rules = [
        'name'          => 'required|max:60',
        'description'   => 'max:155',
        'completed'     => 'numeric',

    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        return view('tasks.index', [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get(),
            'tasksInComplete' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '0')->get(),
            'tasksComplete' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '1')->get()
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_all()
    {
        $user = Auth::user();
        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_incomplete()
    {
        $user = Auth::user();
        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '0')->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_complete()
    {
        $user = Auth::user();
        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $user                   = Auth::user();
        $task                   = $request->all();
        $task['user_id']        = $user->id;
        Task::create($task);
        return redirect('/tasks')->with('success', 'Task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task               = Task::findOrFail($id);
        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, Request $request, $id)
    {

        $this->validate($request, $this->rules);

        $task               = Task::findOrFail($id);
        $task->name         = $request->input('name');
        $task->description  = $request->input('description');
        $task->completed    = $request->input('completed');
        $task->save();
        return redirect('tasks')->with('success', 'Task Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Task::findOrFail($id)->delete();
        return redirect('/tasks')->with('success', 'Task Deleted');

    }
}