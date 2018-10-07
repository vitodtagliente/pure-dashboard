<?php

router()->get('/', 'App\\Controllers\\WelcomeController@index');

// Authentication routes

router()->get('/login', 'App\\Controllers\\AuthController@login_view');
router()->get('/register', 'App\\Controllers\\AuthController@register_view');
router()->get('/logout', 'App\\Controllers\\AuthController@logout');
router()->post('/login', 'App\\Controllers\\AuthController@authenticate');

// Dashboard main routes

router()->get('/dashboard', 'App\\Controllers\\DashboardController@home');

?>
