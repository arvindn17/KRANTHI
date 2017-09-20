<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class IndexController extends AdminAppController {
    public function index()
    {
        if(!empty($this->request->session()->read('Auth'))){
            $userSession = $this->request->session()->read('Auth');
        } else {
            $userSession = array();
        }
//        $this->__printData($userSession);
        $this->set('userSessionDetails', $userSession);
        $this->set('title', 'Admin Dashborad');
    }
}
