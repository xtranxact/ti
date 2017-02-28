@extends('layouts.main_blank')
@section('content')
<div class="row wrapper wrapper-content">
    <div class = "row">
        <div class="col-md-8 col-md-offset-2 text-center">  
            <p> 
                <h1 class="text-green"><b>Welcome,</b> Daniel Uche Daniel of Stransact Partners</h1>
                <h4>Now that you are up Choose one of this actions to start time billing!!</h4>
            </p><br/><br/>
            <div class="col-md-4 text-center">
                <img src="{{asset('public/images/dashboard.png')}}" class="img-circle img-center" alt="Cinque Terre" width="150" height="150"/>
                <p >Your Dashboard</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('public/images/preference.png')}}" class="img-circle img-center" alt="Cinque Terre" width="150" height="150"/>
                <p>Set your Companies preferences</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('public/images/company.png')}}" class="img-circle img-center" alt="Cinque Terre" width="150" height="150"/>
                <p><a href="{{url('clients')}}"> Begin by Creating Clients</a></p>
            </div>
            <div class = "col-md-12" >
                <a href=""><h2>Skip this step and Proceed to Dashboard</h2></a>
            </div>
        </div>
    </div>
</div>
@endsection