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
        return $view->with([
            'total'=>$this->task->total(),
            'todoCount'=>$this->task->todoCount(),
            'doneCount'=>$this->task->doneCount(),
        ]);
    }
}

// E:\wamp\www\task\app\Repositories\TasksRepository.php