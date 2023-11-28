<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    //
    protected $fillable = [
        'name', 'display_name'
    ];
    function users(){
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }
    function permissions(){
        return $this->belongsToMany('App\Permission', 'role_permission','role_id', 'permission_id');
    }
    
}
