<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['page_title', 'slug', 'content', 'thumbnail', 'status', 'user_id'];
    function user()
    {
        return $this->belongsTo('App\User');
    }
    function menu(){
        return $this->hasOne('App\Menu');
    }
}
