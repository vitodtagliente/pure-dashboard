<?php

namespace Module\Comuni\Controllers;
use App\Controllers\ResourceController;
use Module\Comuni\Models\Comune;

class ComuniController extends ResourceController {

    function get_model_class(){
        return Comune::class;
    }

    public function home(){
		view('Comuni::home.php');
	}

    public function load(){
        $file = fopen(base_path('modules/Comuni/listacomuni.csv'), "r") or die("Unable to open file!");
        $first_line = true;
        while(!feof($file)){
            $line = trim(fgets($file));
            if($first_line){
                // skip
                $first_line = false;
                continue;
            }

            $fields = explode(';', $line);

            $comune = new Comune;
            $comune->istat = $fields[0];
            $comune->nome = $fields[1];
            $comune->provincia = $fields[2];
            $comune->cap = $fields[5];
            $comune->regione = $fields[3];
            $comune->prefisso = $fields[4];
            $comune->link = $fields[8];
            $comune->active = true;
            $comune->save();
        }
        fclose($file);
        redirect(base_url('dashboard/comuni'));
    }
}

?>
