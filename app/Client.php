<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Client extends Model
{
    use SoftDeletes;

	public $fillable = ['name', 'short_name', 'client_number', 'status', 'note','company_id','manager'];
    
    public static $rules = ['name'=>'bail|required','short_name'=>'bail|required','status'=>'bail|required','client_number'=>'bail|required','note'=>'bail|required','manager'=>'bail|required'];

    protected $dates = ['deleted_at'];

    public function user() { return $this->belongsTo('App\User', 'user_id', 'id'); }

    public function manager() { return $this->belongsTo('App\User', 'manager', 'id'); }
    
    static function save_client($data, $companyID){
      	DB::beginTransaction();
        try{
        	if(isset($data['id'])){
	            $c = Client::find($data['id']);
	            $c->name = $data['name'];
	            $c->short_name = $data['short_name'];
	            $c->client_number = $data['client_number'];
	            $c->note = $data['note'];
	            $c->status = $data['status'];
	            $c->company_id = $companyID;
	            $c->save();
            }else{
            	$data['company_id']=$companyID;
                Client::create($data);
            }
        }catch(\Exception $e){
            DB::rollback();
            return $e; // "serverError";
        }     
        DB::commit();
        return true;
    }

    static function getDetails($id){
        return Client::where('id',$id)->first();
    }

    static function getClients($com, $id = null,$select =null){
        if($select){
            return Client::where('company_id',$com)->select('name','id')->get();
        }
        if($id){
            return DB::table('clients')
            ->select(DB::raw("clients.id, clients.name as name, clients.short_name as short_name, 
                        CASE clients.status WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status, CONCAT(users.firstname,' ', users.lastname) as manager, clients.client_number, clients.company_id, clients.note as note, clients.created_at as created_at, clients.updated_at as updated_at"))
                ->join('users', 'users.id', '=' , 'clients.manager')
                ->where('deleted_at',null)->where('clients.id',$id)->first();
        }
        return DB::table('clients')
            ->select(DB::raw("clients.id, clients.name as name, clients.short_name as short_name, CASE clients.status
          WHEN 0 THEN 'In-Active' WHEN 1 THEN 'Active' END as status, CONCAT(users.firstname,' ', users.lastname) as manager, clients.client_number, clients.company_id, clients.note as note, clients.created_at as created_at, clients.updated_at as updated_at"))
                ->join('users', 'users.id', '=' , 'clients.manager')
                ->where('company_id',$com)->where('deleted_at',null)->get(); 
    }

    static function deleteClient($id){
        return Client::where('id',$id)->delete();
    }
}


 