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
$routes->get('/about', 'CarController::about', ['as'=>'about']);
// $routes->get('/cars/fetchCars', 'CarController::fetchCars', ['as' => 'fetchCars']);
$routes->get('/car/fetchCars', 'CarController::fetchCars', ['as' => 'fetchCars']);
$routes->get('/car/fetchQuotes', 'CarController::fetchQuotes', ['as' => 'fetchQuotes']);
$routes->get('/car/viewQuotes/(:any)', 'CarController::viewQuotes/$1', ['as' => 'viewQuotes']);
