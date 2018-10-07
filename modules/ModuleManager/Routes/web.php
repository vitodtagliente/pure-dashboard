<?php

// home
router()->get('/dashboard/modules', 'Module\\ModuleManager\\Controllers\\ModuleManagerController@home');
// all, show, delete
resource_routes('/dashboard/modules', 'Module\\ModuleManager\\Controllers\\ModuleManagerController');
router()->post('/dashboard/modules/edit', 'Module\\ModuleManager\\Controllers\\ModuleManagerController@edit');
router()->get('/dashboard/modules/clear', 'Module\\ModuleManager\\Controllers\\ModuleManagerController@clear');
router()->get('/dashboard/modules/load', 'Module\\ModuleManager\\Controllers\\ModuleManagerController@load');

?>
