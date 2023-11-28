<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category_product extends Model
{
    //
    protected $fillable = ['product_id', 'cat_id'];
    protected  $table = 'category_product';
}
