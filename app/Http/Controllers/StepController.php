<?php

namespace App\Http\Controllers;

use App\Step;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StepRequest;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $steps = $task->steps;
        $inProcess = $task->steps->where('completion',0)->values();
        $process = $task->steps->where('completion',1)->values();
        return view('step.show',compact('task','steps','inProcess','process'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task,StepRequest $request)
    {
        // return response()->json([
        //     'step'=>$task->steps()->create($request->only('name'))
        // ]);
        $task->steps()->create($request->only('name'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, Step $step, Request $request)
    {
        $step->name = $request->name;
        $step->update();
    }
    
    public function toggle(Task $task, Step $step, Request $request)
    {
        $step->completion = $request->completion;
        $step->update();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task,Step $step)
    {
        $status = $step->delete();
        return response()->json([
            'status'=> $status,
        ]);
    }

    public function completeAll(Task $task,Request $request)
    {
        $task->steps()->update([
            'completion'=>$request->completion,
        ]);
    }
}
