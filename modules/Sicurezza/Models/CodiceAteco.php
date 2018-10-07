<?php

namespace Module\Sicurezza\Models;
use Pure\Model;

class CodiceAteco extends Model
{
    public function __construct(){
        $this->field('id');
        $this->field('name');
        $this->field('description');
        $this->field('danger_class');
        $this->field('active');
        $this->id('id');
    }
}

?>
