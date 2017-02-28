<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use Validator;
use Input;
use Auth;

use App\Job;
use App\User;
use App\Task;
use App\Company;
use App\Client;
use App\Terminology;


class CompanyController extends Controller {

	public function __construct()
    {
        $this->middleware('auth'); //, ['except' => ['register','verify_email']]
    }

	public function dashboard()
	{	
		return view('company.dashboard');
	}

	public function clients(Request $request, $id=null)
	{
		$companyID = Company::getCompanyID(Auth::user()->id);
		if($request->isMethod('post') && $request->input('save')){			
			$save = Client::save_client($request->all(), $companyID);
			if($save === "serverError"){
				return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
			}else{
				$msg = $request->id ? 'updated' : 'saved';
				return response()->json(['success'=>true, 'msg'=> 'Client '. $msg . ' Successfully']);
			}
		}
		$managers = User::getUsers($companyID);
		if($request->ajax()){
			if($request->input('table')){
				return Client::getClients($companyID);
			}else if($request->isMethod('post') && $request->input('delete') ){
				$deleted =  Client::deleteClient($request->input('id'));
				if($deleted){
					return response()->json(['success'=>true, 'msg'=> 'Client deleted Successfully']);
				}else{
					return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
				}
			}else if($id && !$request->input('edit')){
				return response()->json(Client::getDetails($id));	
			}else if($request->input('edit')){
				return view('company.client.clients_edit')->with('managers',$managers);
			}
		}else if($request->input('add')){
			return view('company.client.clients_add')->with('managers',$managers);
		}else if($request->input('details')){
			$client = Client::getClients($companyID,$id);
			return view('company.client.clients_view')->with('client',$client);
		}
		return view('company.client.clients');
	}

	public function tasks(Request $request, $id=null)
	{
		$companyID = Company::getCompanyID(Auth::user()->id);
		if($request->isMethod('post') && $request->input('save')){	
			$save = Task::save_task($request->all(), $companyID);
			if($save === "serverError"){
				return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
			}else{
				$msg = $request->id ? 'updated' : 'saved';
				return response()->json(['success'=>true, 'msg'=> 'Task '. $msg . ' Successfully']);
			}
		}
		if($request->ajax()){
			if($request->input('table')){
				return Task::getTasks($companyID);
			}else if($request->isMethod('post') && $request->input('delete') ){
				$deleted =  Task::deleteTask($request->input('id'));
				if($deleted){
					return response()->json(['success'=>true, 'msg'=> 'Task deleted Successfully']);
				}else{
					return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
				}
			}else if($id && !$request->input('edit')){
				return response()->json(Task::getDetails($id));	
			}else if($request->input('edit')){
				return view('company.task.task_edit');
			}
		}else if($request->input('add')){
			return view('company.task.task_add');
		}else if($request->input('details')){
			$task = Task::getTasks($companyID,$id);
			return view('company.task.task_view')->with('task',$task);
		}
		return view('company.task.tasks');
	}

	public function jobs(Request $request, $id=null)
	{
		$companyID = Company::getCompanyID(Auth::user()->id);
		if($request->isMethod('post') && $request->input('save')){	
			$save = Job::save_job($request->all(), $companyID);
			if($save === "serverError"){
				return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
			}else{
				$msg = $request->id ? 'updated' : 'saved';
				return response()->json(['success'=>true, 'msg'=> 'Job '. $msg . ' Successfully']);
			}
		}
		$managers = User::getUsers($companyID);
		$clients = Client::getClients($companyID,null,'select');
		if($request->ajax()){
			if($request->input('table')){
				return Job::getJobs($companyID);
			}else if($request->isMethod('post') && $request->input('delete') ){
				$deleted =  Job::deleteJob($request->input('id'));
				if($deleted){
					return response()->json(['success'=>true, 'msg'=> 'Job deleted Successfully']);
				}else{
					return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']);
				}
			}else if($id && $request->input('getsingle')){
				return response()->json(Job::getDetails($id));	
			}else if($request->input('edit')){
				return view('company.jobs.jobs_edit')->with('managers',$managers)->with('clients',$clients);
			}
		}else if($request->input('add')){
			return view('company.jobs.jobs_add')->with('managers',$managers)->with('clients',$clients);
		}else if($request->input('details')){
			$job = Job::getJobs($companyID,$id);
			return view('company.jobs.jobs_view')->with('job',$job);
		}
		return view('company.jobs.jobs');
	}
}

?>