<?php

namespace App\Services;
use Pure\Service;
use App\Models\Module;
use Pure\Application;
use Pure\Auth;

class ModuleService extends Service {

    public function boot(){

        // check if logged in
        if(Auth::check() == false)
            return;

        // get all modules
        $modules = Module::all();
        // if there aren't modules, exit
        if(empty($modules)) return;

        // be sure that the application is valid
        $app = Application::main();
        assert($app);

        // get the user model
        $user = Auth::user();

        // register module's routes and views
        foreach($modules as $module)
        {
            // check if the user has the right role
            if($module->active && $user->role >= $module->role)
            {
                $module_path = base_path('modules/' . $module->name);
                if(file_exists($module_path . '/register.php'))
                    include_once($module_path . '/register.php');
                if(file_exists($module_path . '/Routes'))
                    $app->loadRoutesFrom($module_path . '/Routes');
                if(file_exists($module_path . '/Views'))
                    $app->loadViewsFrom($module_path . '/Views', $module->name);
            }
        }
    }

    public function start(){
        
    }

    public function stop(){

    }

}

?>
