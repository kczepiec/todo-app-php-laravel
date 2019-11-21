@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <form action="{{ route('task.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="d-flex">
                    <input type="text" name="name" class="form-control rounded-0">
                    <input type="submit" class="btn btn-primary rounded-0" value="Create new todo">
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($tasks as $task)
            <div class="card mb-4 rounded-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="task__">
                            {{-- <a href="{{ route('task.edit', $task->id) }}" class="btn btn-link text-primary">
                                <i class="fi flaticon-edit"></i>
                            </a> --}}
                            {{-- <a href="{{ route('task.show', $task->id) }}" class="btn btn-link text-secondary">{{ $task->name }}</a> --}}
                            <span class="text-secondary">{{ $task->name }}</span>
                    </div>
                    <div class="task__action">
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                        @method('DELETE')
                        @csrf 
                        
                        <button type="submit" class="btn btn-outline-danger"><i class="fi flaticon-bin"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
