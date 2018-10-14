<?php

namespace App\Controllers;
use Pure\Controller;
use Pure\Template\View;
use Pure\ORM\Schema;

abstract class ResourceController extends Controller {

    protected abstract function get_model_class();

    public function all(){
        $models = array();
        foreach($this->get_model_class()::all() as $model)
        {
            array_push($models, $model->data());
        }
        response($models);
    }

    public function delete(){
        $id = request('id');
        $model = $this->get_model_class()::find("id = $id");
        if($model)
        {
            response($model->erase());
        }
        else response(false);
    }

    public function show($id){
        $model = $this->get_model_class()::find("id = $id");
        response(($model)?$model->data():false);
    }

}

?>
