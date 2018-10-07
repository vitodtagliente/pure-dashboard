<?php

// Codici Ateco
router()->get('/dashboard/comuni', 'Module\\Comuni\\Controllers\\ComuniController@home');
router()->get('/dashboard/comuni/all', 'Module\\Comuni\\Controllers\\ComuniController@all');
router()->get('/dashboard/comuni/load', 'Module\\Comuni\\Controllers\\ComuniController@load');

?>
