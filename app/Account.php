<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    //
    use SoftDeletes;
    protected $table = 'account';
    protected $fillable = ['fullname', 'username', 'email', 'password', 'confirm_password', 'phone_number', 'gender', 'avatar'];
    function orders()
    {
        return $this->hasMany('App\Order');
    }
}
