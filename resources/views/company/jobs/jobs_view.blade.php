@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
        <h2>job :: {{$job->name}}</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="jobCtrl">
    <div class="row">
        <div class="col-lg-6 col-md-offset-3">
            <h2>Basic Information</h2>
            <div class="dropdown pull-right">
              <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Perform Action
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#" ng-click="editjob({{ $job->id }})">Edit this job</a></li>
                <li><a href="#">Delete {{ $job->name }}</a></li>
              </ul>
            </div>
            <hr/>
              <table class="table borderless">

            <tr>
                <td><b>Name: </b> {{$job->name}} </td>
            </tr>
            <tr>
                <td><b>job Status: </b> {{$job->status}}</td>
            </tr>
            <tr>
                <td><b>job Note: </b> {{$job->preview }}</td>
            </tr>
            </table>
        </div>   
    </div>
</div>


@endsection

