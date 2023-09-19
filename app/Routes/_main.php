<?php

$routes->get('/', 'Home::index');

$routes->post('bot_hook', 'Bot::hook');
$routes->cli('cli', 'Bot::hook');
$routes->get('bot_set', 'Bot::set');
$routes->get('bot_unset', 'Bot::unset');