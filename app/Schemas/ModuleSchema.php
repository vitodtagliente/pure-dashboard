<?php

namespace App\Schemas;
use Pure\SchemaHandler;
use App\Models\Module;

class ModuleSchema extends SchemaHandler
{
    public function table(){
        return Module::table();
    }

    protected function define($schema){
        $schema->add('id', 'INT');
        $schema->add('name', 'VARCHAR(30)', 'NOT NULL');
        $schema->unique('name');
        $schema->add('description', 'VARCHAR(50)');
        $schema->increments('id'); // auto_increment
        $schema->primary('id'); // set the primary key
        $schema->add('active', 'BOOLEAN', 'NOT NULL');
        $schema->add('role', 'INTEGER', 'NOT NULL');
    }
}

?>
