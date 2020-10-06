<?php

namespace App\Http\Livewire;
use App\Models\Task as ModelTask;

use Livewire\Component;

class Task extends Component
{
    public $task = '';

    public $update = false;

    public $task_id;

    protected $listeners = ['showTask' => 'getTask'];

    protected $rules = [
        'task' => 'required|min:8'
    ];

    public function addNewTask()
    {
        $this->validate();

        ModelTask::create([
            'user_id' => auth()->user()->id,
            'task' => $this->task
        ]);

        $this->emit('taskAdded');

        $this->task = '';
    }

    public function updateTask()
    {
        $this->validate();

        $task = ModelTask::find($this->task_id);

        $task->task = $this->task;

        $task->save();

        $this->emit('taskUpdated');
    }

    public function cancelUpdate()
    {
        $this->update = false;

        $this->task = '';
    }

    public function getTask($task_id)
    {
        $this->task_id = $task_id;

        $this->task = ModelTask::find($task_id)->task;

        $this->update = true;
    }


    public function render()
    {
        return view('livewire.task');
    }
}
