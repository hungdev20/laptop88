<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['product_title', 'slug', 'code', 'thumbnail', 'intro', 'special_offer','description', 'price', 'qty', 'user_id', 'status', 'meta_desc','meta_keywords'];
    function user()
    {
        return $this->belongsTo('App\User');
    }
    function files()
    {
        return $this->hasMany('App\File');
    }
    function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    function cats()
    {
        return $this->belongsToMany('App\Product_cat', 'category_product', 'product_id', 'cat_id');
    }
    function paras()
    {
        return $this->belongsToMany('App\Parameter_pro', 'parapro_product', 'product_id', 'para_id')->withPivot('parent_id');
    }
    function orders()
    {
        return $this->belongsToMany('App\Order', 'product_order')->withPivot('qty');
    }
}
