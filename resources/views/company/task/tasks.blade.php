@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading" >
    <div class="col-lg-9">
        <h2>Tasks</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{URL('dashboard')}}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Tasks</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <br/>
        <p>
            <a class="btn btn-primary pull-right" href="{{URL('tasks?add=newEntity')}}">Add New Task</a>
        </p> 
    </div>
</div>

<div class="wrapper wrapper-content animated" ng-controller="TaskCtrl">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="mail-box-header">
        <table datatable="" dt-options="dtOptions" dt-columns = "dtColumns" dt-instance = "nested.dtInstance"  class="table table-condensed table-striped table-bordered table-hover dataTables-example ng-isolate-scope dataTable" >
        </table> 
        </div>
        </div>
    </div>
</div>


@endsection

