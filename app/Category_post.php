<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category_post extends Model
{
    //
    protected $fillable = ['post_id', 'cat_id'];
    protected  $table = 'category_post';
}
