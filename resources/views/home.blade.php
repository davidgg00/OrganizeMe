@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center">Your Tasks</h2>
            <div class="wrapper-form mt-3 mb-4">
                <form class="d-flex justify-content-center col-sm-10 mx-auto" id="createTask" method="GET">
                    @csrf
                    <input type="text" class="form-control col-md-8" id="content" placeholder="What do you need to do today?" name="content">
                    <button class="add btn btn-primary font-weight-bold col-md-1">Add</button>
                </form>
            </div>
            <div class="card">

                <div class="card-header">Tasks</div>
                <div class="card-body">
                    @foreach($tasks as $task)
                    @if($task->done == 0)
                    <div class="task d-flex col-12 mb-4 mt-2" data-id="{{$task->id}}">
                        <div class="hijo d-flex align-content-center col-11">
                            <i class="fas fa-times remove" onclick="remove({{$task->id}})"></i>
                            <p class="tarea">{{$task->content}}</p>
                        </div>

                        <i class="fas fa-check done" onclick="done({{$task->id}})"></i>
                    </div>

                    @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection