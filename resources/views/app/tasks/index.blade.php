@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        {{ $task->name }}
        <p>{!! $task->description !!}</p>
    </div>
</div>
@endsection
