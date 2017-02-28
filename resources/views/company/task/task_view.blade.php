@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>Task :: {{$task->name}}</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="TaskCtrl">
    <div class="row">
        <div class="col-lg-6 col-md-offset-3">
            <h2>Basic Information</h2>
            <div class="dropdown pull-right">
              <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Perform Action
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#" ng-click="editTask({{ $task->id }})">Edit this Task</a></li>
                <li><a href="#">Delete {{ $task->name }}</a></li>
              </ul>
            </div>
            <hr/>
              <table class="table borderless">

            <tr>
                <td><b>Name: </b> {{$task->name}} </td>
            </tr>
            <tr>
                <td><b>task Status: </b> {{$task->status}}</td>
            </tr>
            <tr>
                <td><b>task Note: </b> {{$task->preview }}</td>
            </tr>
            </table>
        </div>   
    </div>
</div>


@endsection

