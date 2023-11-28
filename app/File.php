<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class File extends Model
{
    //
    protected $fillable = ['path_img', 'product_id'];
    function product()
    {
        return $this->belongsTo('App\Product');
    }
}
