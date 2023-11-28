<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class GlobalSetting extends Model

{

    //

    protected  $table = 'global_setting';

    protected $fillable = ['header', 'footer','bodyTop','bodyBottom','user_id'];

    function user()

    {

        return $this->belongsTo('App\User');

    }

}

 