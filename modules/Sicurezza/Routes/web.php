<?php

// Codici Ateco
router()->get('/dashboard/sicurezza/ateco', 'Module\\Sicurezza\\Controllers\\CodiceAtecoController@home');
router()->get('/dashboard/sicurezza/ateco/request', 'Module\\Sicurezza\\Controllers\\CodiceAtecoController@request');
router()->get('/dashboard/sicurezza/ateco/all', 'Module\\Sicurezza\\Controllers\\CodiceAtecoController@all');
router()->get('/dashboard/sicurezza/ateco/load', 'Module\\Sicurezza\\Controllers\\CodiceAtecoController@load');

?>
