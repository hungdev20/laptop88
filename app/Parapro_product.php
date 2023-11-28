<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Parapro_product extends Model
{
    //
    protected $fillable = ['para_id','parent_id', 'product_id'];
    protected $table = 'parapro_product';
}
