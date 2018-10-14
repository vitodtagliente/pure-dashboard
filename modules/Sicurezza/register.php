<?php

// Module registration

{
    $app = \Pure\Application::main();
    $app->registerSchema('\Module\Sicurezza\Models\CodiceAteco');

    $sidebar = \App\Libraries\Sidebar::main();
    $sidebar->register(
    	new \App\Libraries\SidebarElement('Codici Ateco', '/dashboard/sicurezza/ateco', 'exclamation'), "Sicurezza"
    );
    $sidebar->register(
    	new \App\Libraries\SidebarElement('Richiesta inserimento', '/dashboard/sicurezza/ateco/request', 'exclamation'), "Sicurezza"
    );
}

?>
