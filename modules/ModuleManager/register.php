<?php

// Module registration

{
    $sidebar = \App\Libraries\Sidebar::main();

    $sidebar->register(
    	new \App\Libraries\SidebarElement('Gestione Moduli', '/dashboard/modules', 'code-branch'), "Development"
    );
}

?>
