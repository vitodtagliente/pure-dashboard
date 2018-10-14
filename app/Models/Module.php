<?php

namespace App\Models;
use Pure\Model;

class Module extends Model
{
    public static function define($schema)
    {
    	$schema->id();
    	$schema->char('name')->unique();
    	$schema->text('description')->nullable();
    	$schema->boolean('active')->default(true);
    	$schema->integer('role')->default(1);
    }

    public static function seed(){
        $module = new Module;
        $module->name = 'ModuleManager';
        $module->description = 'Modulo per la gestione dei moduli';
        $module->role = 100;
        $module->save();
    }
}

?>
