<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Job extends Model
{
    use SoftDeletes;

	public $fillable = ['name', 'company_id','client_id' ,'time_entry_preview', 'status', 'number','billable','manager','estimated_time','note'];
    
    public static $rules = ['name'=>'bail|required','billable'=>'bail|required','status'=>'bail|required','client_id'=>'bail|required','time_entry_preview'=>'bail|required','number'=>'bail|required','manager'=>'bail|required'];

    protected $dates = ['deleted_at'];

    public function user() { return $this->belongsTo('App\User', 'user_id', 'id'); }

    public function manager() { return $this->belongsTo('App\User', 'manager', 'id'); }
    
    static function save_job($data, $companyID){
      	DB::beginTransaction();
        try{
        	if(isset($data['id'])){
	            $c = Job::find($data['id']);
	            $c->name = $data['name'];
	            $c->number = $data['number'];
	            $c->time_entry_preview = $data['number'] .'-'. $data['name'];
	            $c->note = $data['note'];
	            $c->status = $data['status'];
	            $c->estimated_time= $data['estimated_time'];
	            $c->billable = $data['billable'];
	            $c->client_id = $data['client_id'];
	            $c->company_id = $companyID;
	            $c->save();
            }else{
            	$data['time_entry_preview']= $data['number'] .'-'. $data['name'];
            	$data['company_id']=$companyID;
                Job::create($data);
            }
        }catch(\Exception $e){
            DB::rollback();
            return "serverError";
        }     
        DB::commit();
        return true;
    }

    static function getDetails($id){
        return Job::where('id',$id)->first();
    }

    static function getjobs($Job, $id = null){
        if($id){
            return DB::table('jobs')
            ->select(DB::raw("jobs.id, jobs.name as name, jobs.number as number, 
                        CASE jobs.status WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status,jobs.billable as billable, CASE jobs.billable WHEN 0 THEN 'NO' WHEN 1 THEN 'YES' END as billable, CONCAT(users.firstname,' ', users.lastname) as manager, jobs.time_entry_preview as preview, estimated_time as estimated_time, jobs.created_at as created_at, jobs.updated_at as updated_at"))
                ->join('users', 'users.id', '=' , 'jobs.manager')
                ->where('deleted_at',null)->where('jobs.id',$id)->first();
        }
        return DB::table('jobs')
            ->select(DB::raw("jobs.id, jobs.name as name, jobs.number as number, 
                        CASE jobs.status WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status, CASE jobs.billable WHEN 0 THEN 'No' WHEN 1 THEN 'Yes' END as billable, CONCAT(users.firstname,' ', users.lastname) as manager, jobs.time_entry_preview as preview, estimated_time, jobs.created_at as created_at, jobs.updated_at as updated_at"))
                ->join('users', 'users.id', '=' , 'jobs.manager')
                ->where('company_id',$Job)->where('deleted_at',null)->get(); 
    }

    static function deleteJob($id){
        return Job::where('id',$id)->delete();
    }

}
