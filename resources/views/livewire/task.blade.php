<div class="mb-5">
    <x-jet-validation-errors/>
    <form>
        @csrf
        <div class="md:flex p-4 md:w-9/12 sm:w-full border-gray-400 rounded shadow-lg items-center">
            <div class="md:w-8/12 sm:w-full">
                <x-jet-label value="{{ $update ? 'UPDATE TASK' : 'CREATE TASK' }}" />
                <x-jet-input class="block mt-1 w-full" type="text" wire:model="task" :value="old('task')" autofocus />
            </div>

            <div class="justify-end mt-4">
                <x-jet-button wire:click="addNewTask" class="{{ $update ? 'hidden' : 'block ml-4' }}">
                    ADD TASK
                </x-jet-button>
                <x-jet-button wire:click="updateTask" class="{{ $update ? 'ml-4 block' : 'hidden' }}">
                    UPDATE TASK
                </x-jet-button>
                <x-jet-button wire:click="cancelUpdate" class="{{ $update ? 'block' : 'hidden' }}">
                    CANCEL
                </x-jet-button>
            </div>
        </div>
    </form>
</div>
