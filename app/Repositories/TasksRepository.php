<?php
namespace App\Repositories;

use App\Task;


class TasksRepository{

    public function find($id){
        return Task::findOrFail($id);
    }
    
    public function create($request){
        return Task::Create([
            'name'=>$request->name,
            'completion'=>0,
            'project_id'=>$request->project_id,
        ]);
    }

    public function check($id){
        $task = $this->find($id);
        $task->completion=(int)True;
        return $task->save();
    }

    public function update($request,$id){
        $task=$this->find($id);
        $task->name=$request->name;
        $task->project_id=$request->project;
        $task->save();
    }

    public function destroy($id){
        $task = $this->find($id);
        return $task->delete();
    }

    public function todo(){
        return request()->user()->tasks()->where('completion',0)->paginate(15);
    }
    public function done(){
        return request()->user()->tasks()->where('completion',1)->paginate(15);
    }

    public function todoCount(){
        return request()->user()->tasks()->where('completion',0)->count();
    }
    public function doneCount(){
        return request()->user()->tasks()->where('completion',1)->count();
    }
    public function total(){
        return request()->user()->tasks()->count();
    }
    
}