<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product_order extends Model
{
    //
    protected $fillable = ['product_id', 'order_id', 'qty'];
    protected  $table = 'product_order';
}
