<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
<<<<<<< HEAD
$routes->get('/', 'Home::index');
=======
$routes->get('/', 'Dashboard::index');


//Tareas
$routes->get('AddTask','CTask::index');
$routes->post('SaveTask','CTask::save');
$routes->get('DeleteTask/(:num)', 'CTask::delete/$1');
$routes->get('EditTask/(:num)', 'CTask::edit/$1');
$routes->post('UpdateTask','CTask::update');
>>>>>>> develop
