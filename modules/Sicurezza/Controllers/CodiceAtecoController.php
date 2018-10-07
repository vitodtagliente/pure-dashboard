<?php

namespace Module\Sicurezza\Controllers;
use App\Controllers\ResourceController;
use Module\Sicurezza\Models\CodiceAteco;

class CodiceAtecoController extends ResourceController {

    function get_model_class(){
        return CodiceAteco::class;
    }

    public function home(){
		view('Sicurezza::ateco/home.php');
	}

    public function request(){
        view('Sicurezza::ateco/new.php');
    }

    // NOTES: test only
    public function load(){
        $codice_ateco = new CodiceAteco;
        $progress = 0;

        $file = fopen(base_path('modules/Sicurezza/ateco.csv'), "r") or die("Unable to open file!");
        while(!feof($file)){
            $line = trim(fgets($file));
            switch($progress)
            {
                case 0:
                    $codice_ateco->name = $line;
                    break;
                case 1:
                    $codice_ateco->description = $line;
                    break;
                default:
                    $codice_ateco->danger_class = $line;
                    $codice_ateco->active = true;
                    $codice_ateco = new CodiceAteco;
                    $progress = -1;
                    break;
            }
            $progress++;
        }
        fclose($file);
        redirect(base_url('dashboard/sicurezza/ateco'));
    }
}

?>
