<?php

namespace Module\Comuni\Models;
use Pure\Model;

class Comune extends Model
{
    public function __construct(){
        $this->field('id');
        $this->field('nome');
        $this->field('provincia');
        $this->field('cap');
        $this->field('istat');
        $this->field('regione');
        $this->field('prefisso');
        $this->field('link');
        $this->field('active');
        $this->id('id');
    }
}

?>
