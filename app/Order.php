<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['code','account_id','qty', 'total', 'status', 'payment', 'note', 'customer', 'phone', 'address','email'];
    function products()
    {
        return $this->belongsToMany('App\Product', 'product_order')->withPivot('qty'); 
    }
    function account()
    {
        return $this->belongsTo('App\Account');
    }
}
