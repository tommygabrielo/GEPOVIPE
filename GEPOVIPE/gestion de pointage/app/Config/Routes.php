<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
* --------------------------------------------------------------------
* Router Setup
* --------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('log', 'Login::auth');

$session = session();
if($session->get('NUMSEC')){
	$routes->get('/employe', 'Employe::index');
	$routes->get('/pointage', 'Pointage::index');
	$routes->get('/visite', 'Visite::index');
	$routes->get('/fonction', 'Fonction::index');
	$routes->get('/pdffonction', 'PdfController::index');
	$routes->get('/pdfemploye', 'PdfEmploye::index');
	$routes->get('/heure', 'Heure::index');
	$routes->get('/register', 'Register::index');
	$routes->get('/home', 'Home::index');
	$routes->get('/compte', 'Compte::index');
	$routes->get('/bilan', 'Bilan::index');
	$routes->get('/histogramme', 'Hist::index');
	$routes->get('/total', 'Total::index');
}else{
	$routes->get('/bilan', 'Login::index');
	$routes->get('/employe', 'Login::index');
	$routes->get('/pointage', 'Login::index');
	$routes->get('/visite', 'Login::index');
	$routes->get('/register', 'Login::index');
	$routes->get('/fonction', 'Login::index');
	$routes->get('/heure', 'Login::index');
	$routes->get('/pdfemploye', 'Login::index');
	$routes->get('/heure', 'Login::index');
	$routes->get('/home', 'Login::index');
	$routes->get('/compte', 'Login::index');
	$routes->get('/', 'Login::index');
	$routes->get('/total', 'Login::index');
}

/*
* --------------------------------------------------------------------
* Additional Routing
* --------------------------------------------------------------------
*
* There will often be times that you need additional routing and you
* need it to be able to override any defaults in this file. Environment
* based routes is one such time. require() additional route files here
* to make that happen.
*
* You will have access to the $routes object within that file without
* needing to reload it.
*/
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
