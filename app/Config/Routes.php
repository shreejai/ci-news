<?php

use App\Controllers\CarController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
$routes->get('test-db', 'TestDB::index');

$routes->get('/cars', 'CarController::index', ['as' => 'cars']);
$routes->get('/car/fetchCars', 'CarController::fetchCars', ['as' => 'fetchCars']);
$routes->get('/car/viewQuotes/(:num)', 'CarController::viewQuotes/$1', ['as' => 'viewQuotes']);
