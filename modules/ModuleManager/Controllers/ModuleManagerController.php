<?php

namespace Module\ModuleManager\Controllers;
use App\Controllers\ResourceController;
use App\Models\Module;
use App\Commands\modules;

class ModuleManagerController extends ResourceController {

    function get_model_class(){
        return Module::class;
    }

    public function home(){
		view('ModuleManager::home.php');
	}

    public function edit(){
        $id = request('id');
        if(isset($id))
        {
            $module = Module::find("id = $id");
            if($module)
            {
                $module->description = request('description');
                $module->role = request('role');
                $module->active = request('active')?1:0;
                response($module->save());
            }
            else response(false);
        }
        else response(false);
    }

    public function clear(){
        $modules = Module::all();
        if(!empty($modules))
        {
            foreach($modules as $module)
            {
                if($module->name != 'ModuleManager')
                    $module->erase();
            }
        }
        redirect(base_url("dashboard/modules"));
    }

    public function load(){
        $command = new modules;
        $command->execute(array('load'));
        redirect(base_url('dashboard/modules'));
    }
}

?>
