<?php

namespace Module\Comuni\Models;
use Pure\Model;

class Comune extends Model
{
    public static function define($schema)
    {
        $schema->id();
        $schema->char('istat');
        $schema->char('nome')->unique();
        $schema->char('provincia', 5);
        $schema->char('cap', 8);
        $schema->char('regione');
        $schema->char('prefisso', 8)->nullable();
        $schema->char('link', 50);
        $schema->boolean('active')->default(true);
    }
}

?>
