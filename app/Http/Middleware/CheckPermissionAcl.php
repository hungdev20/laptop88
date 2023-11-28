<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\User;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        //Lay tat ca role cua user login vao he thong
        $listRoleOfUser = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('users.id', Auth::id())
            ->select('roles.*')
            ->get()->pluck('id')->toArray();

        //lay tat ca cac permission khi user login vao he thong
        $listPermissionOfUser = DB::table('roles')
            ->join('role_permission', 'roles.id', '=', 'role_permission.role_id')
            ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id', $listRoleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();
        //Lay ra ma man hinh tuong ung de check phan quyen
        $checkPermission = Permission::where('name', $permission)->first()->id;
        //Kiem tra user co duoc phep vao man hinh hay khong
        if ($listPermissionOfUser->contains($checkPermission)) {
            return $next($request);
        } else {
            return abort(401);
        }
    }
}
