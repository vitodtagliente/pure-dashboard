<?php

namespace Module\Comuni\Schemas;
use Pure\SchemaHandler;
use Module\Comuni\Models\Comune;

class ComuneSchema extends SchemaHandler
{
    public function table(){
        return Comune::table();
    }

    protected function define($schema){
        $schema->add('id', 'INT');
        $schema->add('istat', 'VARCHAR(8)', 'NOT NULL');
        $schema->add('nome', 'VARCHAR(30)', 'NOT NULL');
        $schema->unique('nome');
        $schema->add('provincia', 'VARCHAR(5)', 'NOT NULL');
        $schema->add('cap', 'VARCHAR(8)', 'NOT NULL');
        $schema->add('regione', 'VARCHAR(30)', 'NOT NULL');
        $schema->add('prefisso', 'VARCHAR(8)');
        $schema->add('link', 'VARCHAR(50)');
        $schema->add('active', 'BOOLEAN', 'NOT NULL DEFAULT 1');
        $schema->increments('id'); // auto_increment
        $schema->primary('id'); // set the primary key
    }
}

?>
