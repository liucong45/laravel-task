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
}