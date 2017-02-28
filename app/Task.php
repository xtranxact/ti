<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Task extends Model
{
    use SoftDeletes;

	public $fillable = ['name', 'code', 'time_entry_preview', 'status', 'company_id'];
    
    public static $rules = ['name'=>'bail|required','short_name'=>'bail|required','status'=>'bail|required',
    						'time_entry_preview'=>'bail|required','code'=>'bail|required'];

    protected $dates = ['deleted_at'];

    public function company() { return $this->belongsTo('App\User', 'user_id', 'id'); }
    
    static function save_task($data, $companyID){
      	DB::beginTransaction();
        try{
        	if(isset($data['id'])){
	            $c = Task::find($data['id']);
	            $c->name = $data['name'];
	            $c->code = $data['code'];
	            $c->time_entry_preview = $data['code'] . '-' . $data['name'];
	            $c->status = $data['status'];
	            $c->company_id = $companyID;
	            $c->save();
            }else{
                $data['time_entry_preview'] = $data['code'] . '-' . $data['name'];
            	$data['company_id']=$companyID;
                Task::create($data);
            }
        }catch(\Exception $e){
            DB::rollback();
            return "serverError";
        }     
        DB::commit();
        return true;
    }

    static function getDetails($id){
        return Task::where('id',$id)->first();
    }

    static function getTasks($client, $id = null){
        if($id){
            return DB::table('tasks')
            	->select(DB::raw("tasks.id, tasks.name as name, tasks.code as code, 
                    CASE tasks.status WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status, tasks.company_id, tasks.time_entry_preview as preview, tasks.created_at as created_at, tasks.updated_at as updated_at"))
                			->where('deleted_at',null)->where('tasks.id',$id)->first();
        }
        return DB::table('tasks')
            ->select(DB::raw("tasks.id, tasks.name as name, tasks.code as code, 
                 CASE tasks.status WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status, tasks.company_id, tasks.time_entry_preview as preview, tasks.created_at as created_at, tasks.updated_at as updated_at"))
            				->where('company_id',$client)->orWhere('company_id',null)->where('deleted_at',null)->get(); 
    }

    static function deleteTask($id){
        return Task::where('id',$id)->delete();
    }
}
