<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Parameter_pro extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['para_title', 'paraEng', 'parent_id', 'status', 'user_id'];
    protected  $table = 'parameter_pro';
    function cats()
    {
        return $this->belongsToMany('App\Product_cat', 'parameterpro_cats', 'para_id', 'cat_id')->withPivot('parent_id');
    }
    function products()
    {
        return $this->belongsToMany('App\Product', 'parapro_product', 'para_id', 'product_id')->withPivot('parent_id');
    }
}
