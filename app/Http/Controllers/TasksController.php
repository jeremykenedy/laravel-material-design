<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;

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
        $data = [
            'tasks'           => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get(),
            'tasksInComplete' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '0')->get(),
            'tasksComplete'   => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '1')->get(),
        ];

        return view('tasks.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_all()
    {
        $user = Auth::user();
        $data = [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get(),
        ];

        return view('tasks.filtered', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_incomplete()
    {
        $user = Auth::user();
        $data = [
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '0')->get(),
        ];

        return view('tasks.filtered', $data);
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
            'tasks' => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->where('completed', '1')->get(),
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $user = Auth::user();
        $task = $request->all();
        $task['user_id'] = $user->id;

        Task::create($task);

        return redirect('/tasks')->with('status', 'Task created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $task = Task::findOrFail($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->completed = $request->input('completed');

        if ($task->completed == '1') {
            $return_msg = 'Task Completed !!!';
        } else {
            $task->completed = 0;
            $return_msg = 'Task Updated';
        }

        $task->save();

        return Redirect::back()->with('status', $return_msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/tasks')->with('status', 'Task Deleted');
    }

    /**
     * Return current users tasks using View::Composer.
     *
     * @param  \App\Providers\ComposerServiceProvider.php
     * @param obj $view
     *
     * @return \Illuminate\View\View
     */
    public function getAllTasks(View $view)
    {
        $user = Auth::user();
        $queryTasks = Task::orderBy('created_at', 'asc');
        $Alltasks = $queryTasks->where('user_id', $user->id)->get();
        $view->with('allTasks', $Alltasks);
    }

    /**
     * Return current users INCOMPLETE tasks using View::Composer.
     *
     * @param  \App\Providers\ComposerServiceProvider.php
     * @param obj $view
     *
     * @return \Illuminate\View\View
     */
    public function getIncompleteTasks(View $view)
    {
        $user = Auth::user();
        $queryTasks = Task::orderBy('created_at', 'asc');
        $tasksInComplete = $queryTasks->where([
            ['user_id', '=', $user->id],
            ['completed', '=', '0'],
        ])->get();

        $view->with('incompleteTasks', $tasksInComplete);
    }

    /**
     * Return current users COMPLETE tasks using View::Composer.
     *
     * @param  \App\Providers\ComposerServiceProvider.php
     * @param obj $view
     *
     * @return \Illuminate\View\View
     */
    public function getCompleteTasks(View $view)
    {
        $user = Auth::user();
        $queryTasks = Task::orderBy('created_at', 'asc');
        $tasksCompleted = $queryTasks->where([
            ['user_id', '=', $user->id],
            ['completed', '=', '1'],
        ])->get();
        $view->with('completeTasks', $tasksCompleted);
    }
}
