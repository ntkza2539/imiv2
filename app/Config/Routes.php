<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');

$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 *
 
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$segment = explode('/', uri_string());
// print_r($segment) ;


$routes->setDefaultController('C_backend');
$routes->get('/', 'Backend\Fbackend\C_backend::index');
$routes->get('/backend', 'Backend\Fbackend\C_backend::index');
$routes->get('/{locale}', 'Backend\Fbackend\C_backend::index');
if(isset($segment[2])){
    $check_backend = $segment[2];
}
if (isset($check_backend)) {
    if ($check_backend == 'backend') {
        
        $routes->get('{locale}/backend', 'Backend\Fbackend\C_backend::index');
        $routes->get('{locale}/backend/Control/(:any)', 'Backend\Fbackend\C_backend::$1');
        $routes->get('{locale}/backend/Auth/(:any)', 'Backend\Auth::$1');        
        $routes->get('{locale}/backend/Fsub/(:any)', 'Backend\Fsub\Sub::$1');
        $routes->get('{locale}/backend/test', 'Backend\Fbackend\C_backend::test');
        
        $routes->get('{locale}/backend/Fmenu/(:any)', 'Backend\Fmenu\Menu::$1');
        $routes->get('{locale}/backend/Fagent/(:any)', 'Backend\Fagent\Agent::$1');
        $routes->get('{locale}/backend/Fbetamount/(:any)', 'Backend\Fbetamount\Betamount::$1');
        $routes->get('{locale}/backend/Freport/(:any)', 'Backend\Freport\Report::$1');
        $routes->get('{locale}/backend/Faccount/(:any)', 'Backend\Faccount\Account::$1');
        $routes->get('{locale}/backend/Fuserinformation/(:any)', 'Backend\Fuserinformation\User_information::$1');
        $routes->get('{locale}/backend/Fadmin/(:any)', 'Backend\Fadmin\Admin::$1');
        $routes->get('{locale}/backend/Fapi/(:any)', 'Backend\Fapi\Api::$1');


        

// =================  พาทจัดการ =============================
        $routes->post('/backend/Auth/(:any)', 'Backend\Auth::$1');
        $routes->post('{locale}/backend/adddata', 'Backend\Fbackend\C_backend::adddata');
        $routes->post('{locale}/backend/editdata', 'Backend\Fbackend\C_backend::editdata');
        $routes->delete('{locale}/backend/del/(:any)/(:any)/(:num)', 'Backend\Fbackend\C_backend::deletedata/$1/$2/$3');
        $routes->post('{locale}/backend/Fmenu/menu(:any)', 'Backend\Fmenu\Menu::$1');
        $routes->post('{locale}/backend/Fagent/(:any)', 'Backend\Fagent\Agent::$1');

    }
}

// if ( $check_backend == 'backend') {
 
// }




/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
