<?php


namespace App\Services;


use Illuminate\Support\Facades\Gate;


class PermissionGateAndPolicyAccess

 
{


    public function setGateAndPolicyAccess()


    {


       
        $this->defineGateProduct();

        $this->defineGateProductCat();
        $this->defineGateProductOrder();
        $this->defineGateParameterPro();

        $this->defineGatePage();

        $this->defineGateMenu();

        $this->defineGateSettings();
 

        $this->defineGateRole();
        $this->defineGateGlobalSetting();

        $this->defineGatePermissionCat();


    }


    //màn hình

    public function defineGateGlobalSetting() 


    {
        Gate::define('add-globalSetting', 'App\Policies\GlobalSettingPolicy@create');

    }
    public function defineGatePermissionCat() 


    {


        Gate::define('list-permissioncat', 'App\Policies\PermissionPolicy@view');


        Gate::define('add-permissioncat', 'App\Policies\PermissionPolicy@create');


        Gate::define('edit-permissioncat', 'App\Policies\PermissionPolicy@update');


        Gate::define('delete-permissioncat', 'App\Policies\PermissionPolicy@delete');
        Gate::define('act-permissioncat', 'App\Policies\PermissionPolicy@act');


    }
    public function defineGateProduct()


    {


        Gate::define('list-product', 'App\Policies\ProductPolicy@view');


        Gate::define('add-product', 'App\Policies\ProductPolicy@create');


        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');


        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
        Gate::define('detail-product', 'App\Policies\ProductPolicy@detail');
        Gate::define('act-product', 'App\Policies\ProductPolicy@act');


    }


    public function defineGateProductCat() 


    {


        Gate::define('list-productcat', 'App\Policies\ProductCatPolicy@view');


        Gate::define('add-productcat', 'App\Policies\ProductCatPolicy@create');


        Gate::define('edit-productcat', 'App\Policies\ProductCatPolicy@update');


        Gate::define('delete-productcat', 'App\Policies\ProductCatPolicy@delete');
        Gate::define('act-productcat', 'App\Policies\ProductCatPolicy@act');


    }
    public function defineGateProductOrder() 


    {


        Gate::define('list-productorder', 'App\Policies\ProductOrderPolicy@view');

        Gate::define('edit-productorder', 'App\Policies\ProductOrderPolicy@update');


        Gate::define('delete-productorder', 'App\Policies\ProductOrderPolicy@delete');
        Gate::define('act-productorder', 'App\Policies\ProductOrderPolicy@act');


    }
    public function defineGateParameterPro()


    {


        Gate::define('list-parameterpro', 'App\Policies\ParameterProPolicy@view');


        Gate::define('add-parameterpro', 'App\Policies\ParameterProPolicy@create');


        Gate::define('edit-parameterpro', 'App\Policies\ParameterProPolicy@update');


        Gate::define('delete-parameterpro', 'App\Policies\ParameterProPolicy@delete');
        Gate::define('act-parameterpro', 'App\Policies\ParameterProPolicy@act');


    }

    public function defineGatePage()

 
    {


        Gate::define('list-page', 'App\Policies\PagePolicy@view');


        Gate::define('add-page', 'App\Policies\PagePolicy@create');


        Gate::define('edit-page', 'App\Policies\PagePolicy@update');


        Gate::define('delete-page', 'App\Policies\PagePolicy@delete');
        Gate::define('detail-post', 'App\Policies\PostPolicy@detail');
        Gate::define('act-post', 'App\Policies\PostPolicy@act');

    }

    public function defineGateMenu()


    {


        Gate::define('list-menu', 'App\Policies\MenuPolicy@view');


        Gate::define('add-menu', 'App\Policies\MenuPolicy@create');


        Gate::define('edit-menu', 'App\Policies\MenuPolicy@update');


        Gate::define('delete-menu', 'App\Policies\MenuPolicy@delete');

        Gate::define('act-menu', 'App\Policies\MenuPolicy@act');

    }
    public function defineGateSettings()


    {


        Gate::define('list-settings', 'App\Policies\SettingPolicy@view');


        Gate::define('add-settings', 'App\Policies\SettingPolicy@create');


        Gate::define('edit-settings', 'App\Policies\SettingPolicy@update');


        Gate::define('delete-settings', 'App\Policies\SettingPolicy@delete');

        Gate::define('act-settings', 'App\Policies\SettingPolicy@act');

    }

    public function defineGateRole()


    {


        Gate::define('list-role', 'App\Policies\RolePolicy@view');


        Gate::define('add-role', 'App\Policies\RolePolicy@create');


        Gate::define('edit-role', 'App\Policies\RolePolicy@update');


        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');


    }


}


