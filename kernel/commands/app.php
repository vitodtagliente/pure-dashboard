<?php

namespace Pure\Commands;
use Pure\Command;
use Pure\Config;

class app extends Command
{
    public function execute($arguments){
        $in_command = array_shift($arguments);

        if(!isset($in_command))
            return;

        // make commands
        if (strpos($in_command, 'make:') === 0) {
            $type_resource = str_replace('make:', '', $in_command);

            if(!empty($type_resource))
            {
                $resource_name = array_shift($arguments);
                if(empty($resource_name))
                    return;

                $folder = __DIR__ . '/../../app/' . ucfirst($type_resource) . 's';
                $filename = $folder . '/' . $resource_name . '.php';

                $resource_filename = __DIR__ . '/../make/' . $type_resource . '.php';

                if(file_exists($folder) && !file_exists($filename) && file_exists($resource_filename))
                {
                    $file_content = file_get_contents($resource_filename);
                    $file_content = str_replace('RESOURCE_NAME', $resource_name, $file_content);

                    $file = fopen($filename, "w") or die("Unable to open file!");
                    fwrite($file, $file_content);
                    fclose($file);

                    outline("Resource $resource_name" . ucfirst($type_resource) . ' created!');
                }
                else outline("Unable to create the resource");
            }
        }
        // generate command
        else if (strpos($in_command, 'generate:') === 0) {
            $type = str_replace('generate:', '', $in_command);

            if(!empty($type))
            {
                switch ($type) {
                    case 'key':
                    // generate the application session key
                    $filename = Config::path() . '/app.ini';
                    if(file_exists($filename))
                    {
                        outline("TODO: implement this command");
                    }
                    else echo "$filename not found!";
                        break;

                    default:
                        // code...
                        break;
                }
            }
        }
        else outline("Command not found!");

        outline();
    }

    public function help(){
        outline("Available commands:");
        outline("- make:command resource_name");
        outline("- make:controller resource_name");
        outline("- make:middleware resource_name");
        outline("- make:model resource_name");
        outline("- make:schema resource_name");
        outline("- make:service resource_name");
        outline();
    }
}

?>
