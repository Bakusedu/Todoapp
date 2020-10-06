<?php

namespace App\Http\Livewire;
use App\Models\Task;

use Livewire\Component;

class AllTasks extends Component
{

    public $tasks = null;

    protected $listeners = [
        'taskAdded' => 'getTasks',
        'taskUpdated' => 'getTasks'
    ];

    public function mount()
    {
        $this->tasks = auth()->user()->tasks;
    }

    public function getTasks()
    {
        $this->tasks = auth()->user()->tasks;
    }

    public function toggleComplete($task_id)
    {
        $task = Task::where('id',$task_id)->first();

        $task->is_complete = !$task->is_complete;

        $task->save();

        $this->mount();
    }

    public function deleteTask($task_id)
    {
        $task = Task::find($task_id);

        $task->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.all-tasks');
    }
}
