<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function pages()
    {
        return $this->hasMany('App\Page');
    }
    function posts()
    {
        return $this->hasMany('App\Post');
    }
    function product_cats()
    {
        return $this->hasMany('App\Product_cat');
    }
    function products()
    {
        return $this->hasMany('App\Product');
    }
    function medias()
    {
        return $this->hasMany('App\Media');
    }
    function menus()
    {
        return $this->hasMany('App\Menu');
    }
    function globalSetting()
    {
        return $this->hasMany('App\GlobalSetting');
    }
    function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
    function permissions()
    {
        return $this->hasMany('App\Permission');
    }
    public function checkPermissionAccess($permissionCheck) 
    {
        //B1:: Lấy tất cả các quyền của user đang login vào hệ thống
        //B2: So sánh giá trị đưa vào của route hiện tại có tồn tại trong các quyền mà user có hay không
        $roles = Auth::user()->roles;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
               
            };
        }
        return false;
    }
}
