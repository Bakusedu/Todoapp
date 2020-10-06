<div class="mt-2">
    @foreach($tasks as $task)
    <div class="flex w-9/12 justify-between">
        <ul class="mr-4 mb-1">
            <li class="{{ $task->is_complete ? 'line-through list-none' : 'list-none' }}">
                <input type="checkbox" {{ $task->is_complete ? 'checked' : '' }} class="mr-2 cursor-pointer" wire:change="toggleComplete({{ $task->id }})" id="">
                <a href="#" class="hover:no-underline" wire:click="$emit('showTask',{{ $task->id }})">{{ $task->task }}</a>
            </li>
        </ul>
        <ul class="mb-1">
            <li class="list-none">
                <x-jet-danger-button 
                    onClick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                    wire:click="deleteTask({{ $task->id }})" 
                >
                    Delete
                </x-jet-danger-button>
            </li>
        </ul>
    </div>
    @endforeach
</div>
