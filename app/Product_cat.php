<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product_cat extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['cat_title','slug','file','parent_id','status', 'user_id','meta_desc', 'meta_keywords'];
    function user()
    {
        return $this->belongsTo('App\User');
    }
    function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'cat_id', 'product_id');
    }
    function paras(){
        return $this->belongsToMany('App\Parameter_pro', 'parameterpro_cats', 'cat_id', 'para_id')->withPivot('parent_id');
    }
    function menu(){
        return $this->hasOne('App\Menu', 'productcat_id');
    }
    function catChiren(){
        return $this->hasMany('App\Product_cat', 'parent_id');
    }
   
}
