<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    //
    use SoftDeletes;
    protected $table = 'menu';
    protected $fillable = ['menu_title', 'slug', 'icon', 'order', 'images', 'status', 'user_id', 'postcat_id', 'productcat_id', 'page_id'];
    function user()
    {
        return $this->belongsTo('App\User');
    }
    function product_cat()
    {
        return $this->belongsTo('App\Product_cat', 'productcat_id');
    }
    function post_cat()
    {
        return $this->belongsTo('App\Post_cat', 'postcat_id');
    }
    function page()
    {
        return $this->belongsTo('App\Page');
    }
}
