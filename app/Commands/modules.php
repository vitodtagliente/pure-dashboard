<?php

/*
    Insieme di comandi shell per la gestione dei moduli dell'applicazione.
*/

namespace App\Commands;
use Pure\Command;
use Pure\ORM\Schema;
use App\Models\Module;

class modules extends Command {

    public function execute($arguments){
        $in_command = array_shift($arguments);

        if(!isset($in_command))
            return;

        switch($in_command)
        {
            // cancella e registra da zero tutti i moduli
            case 'reload':
                if($this->clear())
                {
                    $this->load();
                }
                else outline("Operation failed!");
                break;
            // mostra a schermo la lista dei moduli registrati con le relative informazioni
            case 'list':
                $modules = Module::all();
                foreach($modules as $module)
                {
                    outline('- ' . $module->name . ': active=' . $module->active . ' role=' . $module->role);
                }
                break;
            case 'load':
                $this->load();
                break;
            case 'clear':
                if($this->clear())
                    outline('Operation done!');
                else outline("Operation failed!");
                break;

            default: outline('Command not found!'); break;
        }

        outline();
    }

    // cancella tutti i moduli registrati
    private function clear(){
        return Schema::clear(Module::table());
    }

    // carica e registra i moduli mancanti
    private function load(){
        $path = base_path('modules');
        if(is_dir($path))
    	{
    		$scan = scandir($path);
    		unset($scan[0], $scan[1]); //unset . and ..
    		foreach($scan as $file)
    		{
    			$current_path = $path . '/' . $file;
    			if(is_dir($current_path))
    			{
                    out('registering module ' . $file . '...');

                    $default_role = 1;
                    $role = config('config.default_role', $current_path);
                    if(!empty($role) && is_numeric($role))
                    {
                        $default_role = $role;
                    }

                    $default_active = true;
                    $active = config('config.default_active', $current_path);
                    if(!empty($active) && is_bool($active))
                    {
                        $default_active = $active;
                    }

    				$module = new Module;
                    $module->name = $file;
                    $module->description = config('config.description', $current_path);
                    $module->active = $default_active;
                    $module->role = $default_role;
                    if($module->save())
                        outline('Success!');
                    else outline('Failed!');
    			}
    		}
    	}
    }

    public function help(){
        outline('Commands:');
        outline('- clear: clear all modules');
        outline('- list: list all loaded modules');
        outline('- load: register modules and missing new ones');
        outline('- reload: clear and load modules');
        outline();
    }

}

?>
