<div class="card my-2 {{ $task->status_id == 1 ? 'alert-success' : '' }}">
    <div class="card-body">
        <div>
            № {{ $task->id }}
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
        </div>
        @if($task->description)
            <div>
                {{ __('Description') }}:
                {{ $task->description }}
            </div>
        @endif
        <div>
            {{ __('Status') }}:
            {{ $task->status->name }}
        </div>
        <div>
            {{ __('Creation date') }}:
            {{ $task->created_at }}
        </div>
        <div class="btn btn-secondary ml-3 mt-3 col-md-3">
            <a href="{{ route('tasks.create') }}" class="text-white">{{ __('Create new task') }}</a>
        </div>

        <div class="btn btn-secondary ml-3 mt-3 col-md-3">
            <a href="{{ route('tasks.edit', $task) }}" class="text-white">{{ __('Change task') }}</a>
        </div>
    </div>
    
</div>