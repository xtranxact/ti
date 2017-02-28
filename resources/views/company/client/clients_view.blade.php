@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-7">
 
        <h2>Client :: {{$client->name}}</h2>

    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="CompanyCtrl">
    <div class="row">
        <div class="col-lg-6 col-md-offset-3">
            <h2>Basic Information</h2>
            <div class="dropdown pull-right">
              <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Perform Action
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#" ng-click="editClient({{ $client->id }})">Edit this Client</a></li>
                <li><a href="#">Delete {{ $client->name }}</a></li>
              </ul>
            </div>
            <hr/>
              <table class="table borderless">

            <tr>
                <td><b>Name: </b> {{$client->name}} </td>
            </tr>
            <tr>
                <td><b>Client Short Name: </b>{{$client->short_name}} </td>
            </tr>
            <tr>
                <td><b>Client Number: </b>  {{$client->client_number}} </td>
            </tr>
            <tr>
                <td><b>Client Status: </b> {{$client->status }}</td>
            </tr>
            <tr>
                <td><b>Client Note: </b> {{$client->note }}</td>
            </tr>
            </table>
            <h2>Client Manager</h2>
            <hr/>
            <h4>{{$client->manager }}</h4>
        </div>   
    </div>
</div>


@endsection

