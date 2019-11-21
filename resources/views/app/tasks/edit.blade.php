@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-body">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="user_id" id="user_id" class="form-control"
                                value="{{ $task->user_id }}" hidden>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update task">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection