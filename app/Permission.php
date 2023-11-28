<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Permission extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'display_name', 'parent_id', 'key_code', 'user_id'
    ];
    function roles(){
        return $this->belongsToMany('App\Role', 'role_permission','permission_id', 'role_id');
    }
    public function permissionsChildren(){
        return $this->hasMany('App\Permission','parent_id');
    }
    function user()
    {
        return $this->belongsTo('App\User');
    }
}
