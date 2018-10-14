<?php

// Module registration

{
    $app = \Pure\Application::main();
    $app->registerSchema('\Module\Comuni\Models\Comune');

    $sidebar = \App\Libraries\Sidebar::main();
    $sidebar->register(
    	new \App\Libraries\SidebarElement('Comuni', '/dashboard/comuni', 'info'), "Raccolta"
    );
}

?>
