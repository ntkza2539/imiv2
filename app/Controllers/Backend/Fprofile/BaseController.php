<?php
namespace App\Controllers\Backend\Fprofile;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

 /**
  * An array of helpers to be loaded automatically upon
  * class instantiation. These helpers will be available
  * to all other controllers that extend BaseController.
  *
  * @var array
  */
 protected $helpers = ['session', 'url'];
 protected $session;

 /**
  * Constructor.
  */
 public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
 {
  // Do Not Edit This Line

 
  
  parent::initController($request, $response, $logger);


  //--------------------------------------------------------------------
  // Preload any models, libraries, etc, here.
  //--------------------------------------------------------------------
  // E.g.:
  $this->leng = service('request')->getLocale();
  $this->session = \Config\Services::session();
  $segment = explode('/', uri_string());
// print_r($segment) ;
if ( !isset($segment[1]) || $segment[1]==null ){
  header('Location: ' .base_url($this->leng.'/backend'));
    die;
 }

  if ($segment[2] == 'backend') {
   if ($this->session->has('session_admin')) {
    if($segment[2] == 'backend' ){  
    }else{
     header('Location: ' .base_url($this->leng.'/backend'));
     die;
    }
   } else {
    if($segment[2] == 'backend'   ){
     if(isset($segment[3])){

      if($segment[4] == 'login' ){
      }else{
       header('Location: '.base_url($this->leng.'/backend/Auth/login'));
       die;
      }   
     }else{
      header('Location: '.base_url($this->leng.'/backend/Auth/login'));
     die;
     }
    }else{
     header('Location: '.base_url($this->leng.'/backend/Auth/login'));
     die;
    }
   }
  } 


 
 }
 

}