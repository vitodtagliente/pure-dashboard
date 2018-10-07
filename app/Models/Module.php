<?php

namespace App\Models;
use Pure\Model;

class Module extends Model
{
    public function __construct(){
        $this->field('id');
        $this->field('name');
        $this->field('description');
        $this->field('active');
        $this->field('role');
        $this->id('id');
    }
}

?>
