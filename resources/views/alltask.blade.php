@extends('layouts.app')

@section('content')

  <h3 class="text-center title-color">Drag and Droppable Cards using Vue.Draggable Demo</h3>
  <div class="well" id="app">
    <task-draggable :tasks-completed="{{ $tasksCompleted }}" :tasks-not-completed="{{ $tasksNotCompleted }}"></task-draggable>
  </div> <!-- end app -->
  <h5><button class="btn btn-default" onclick="window.location.reload()"><b>REFRESH</b></button> <a href="#">Link</a>.</h5>

@endsection
