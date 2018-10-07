<?php

namespace Module\Sicurezza\Schemas;
use Pure\SchemaHandler;
use Module\Sicurezza\Models\CodiceAteco;

class CodiceAtecoSchema extends SchemaHandler
{
    public function table(){
        return CodiceAteco::table();
    }

    protected function define($schema){
        $schema->add('id', 'INT');
        $schema->add('name', 'VARCHAR(30)', 'NOT NULL');
        $schema->unique('name');
        $schema->add('description', 'VARCHAR(50)');
        $schema->add('danger_class', 'VARCHAR(30)', 'NOT NULL');
        $schema->add('active', 'BOOLEAN');
        $schema->increments('id'); // auto_increment
        $schema->primary('id'); // set the primary key
    }
}

?>
