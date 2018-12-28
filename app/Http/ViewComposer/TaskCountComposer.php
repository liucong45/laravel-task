<?php
namespace App\Http\ViewComposer;
use App\Repositories\TasksRepository;
use Illuminate\View\View;
class TaskCountComposer{
    protected $task;
    public function __construct(TasksRepository $task){
        $this->task=$task;
    }

    public function compose(View $view){
        if (auth()->user()) {
            return $view->with([
                'total'=>$this->task->total(),
                'todoCount'=>$this->task->todoCount(),
                'doneCount'=>$this->task->doneCount(),
            ]);
        }
    }
}