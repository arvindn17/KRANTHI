<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AdminAppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            //'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'userModel' => 'AdminUsers',
                    'finder' => 'auth'
                ],
            /* 'Basic' => [
              'fields' => ['username' => 'email', 'password' => 'password'],
              'userModel' => 'AdminUsers'
              ] */
            ],
            'loginAction' => [
                'controller' => 'AdminUsers',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Index',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'AdminUsers',
                'action' => 'login',
                'home'
            ],
            //'ajaxLogin' => "ajaxUnAuthorizedAccess"
        ]);
        
        //$this->viewBuilder()->layout('admin_default');
        $layout ='admin_default';
         if(!empty($this->request->session()->read('Auth'))){
            $userSession = $this->request->session()->read('Auth');
            $layout = "admin_layout";
        } else {
            $userSession = array();
        }
        $this->viewBuilder()->layout($layout);
//        $this->__printData($userSession);
        $this->set('userSessionDetails', $userSession);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        
        if(!array_key_exists('title', $this->viewVars)){
            $this->set('title', $this->params['action'].' '.$this->params['controller']);
        }
        
        if(!array_key_exists('user_name', $this->viewVars)){
            $this->set('user_name', $this->Auth->user('name'));
        }
        
        /*if( $this->response->type() == "application/json" ){
            $this->viewBuilder()->layout('ajax');
        }*/
        
    }
    
    public function beforeFilter(\Cake\Event\Event $event) {
        if($this->name=='AdminCapabilities'){
            $this->redirect(['controller'=>'Index','action'=>'index']);
        }
        $this->Auth->sessionKey = 'Auth.Backend';
    }
    
    protected function __printData($a){
        echo '<pre>';print_r($a);die;
    }
    
    protected function __checkAdminCapabilities($cabability){
        if(!empty($this->request->session()->read('Auth')['Backend'])){
            if(in_array($cabability, $this->request->session()->read('Auth')['Backend']['admin_capabilities'])){
                return true;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    protected function __getDistrictList(){
        $a=[
            'Warangal Rural'=>'Warangal Rural',
            'GadwaL'=>'GadwaL',
            'J.S Bhupalpally'=>'J.S Bhupalpally',
            'Karimnagar'=>'Karimnagar',
            'Mahabubabad'=>'Mahabubabad',
            'Medak Dist'=>'Medak Dist',
            'Nalgonda'=>'Nalgonda',
            'Ranga Reddy'=>'Ranga Reddy',
            'Warangal Urban'=>'Warangal Urban'
        ];
        return $a;
    }
    
    protected function __getDistrictPincodeList(){
        $a=[
            '506122'=>'Warangal Rural',
            '509125'=>'GadwaL',
            '506169'=>'J.S Bhupalpally',
            '505001'=>'Karimnagar',
            '506101'=>'Mahabubabad',
            '502220'=>'Medak Dist',
            '508001'=>'Nalgonda',
            '501506'=>'Ranga Reddy',
            '506002'=>'Warangal Urban'
        ];
        return $a;
    }
    
    protected function __getDistrictPincodePriceList(){
        $a=[
            '506122'=>[
                'district'=>'Warangal Rural',
                'rate'=>'0.40'
            ],
            '509125'=>[
                'district'=>'GadwaL',
                'rate'=>'0.50'
            ],
            '506169'=>[
                'district'=>'J.S Bhupalpally',
                'rate'=>'0.38'
            ],
            '505001'=>[
                'district'=>'Karimnagar',
                'rate'=>'0.37'
            ],
            '506101'=>[
                'district'=>'Mahabubabad',
                'rate'=>'0.40'
            ],
            '502220'=>[
                'district'=>'Medak Dist',
                'rate'=>'0.56'
            ],
            '508001'=>[
                'district'=>'Nalgonda',
                'rate'=>'0.60'
            ],
            '501506'=>[
                'district'=>'Ranga Reddy',
                'rate'=>'0.40'
            ],
            '506002'=>[
                'district'=>'Warangal Urban',
                'rate'=>'0.37'
            ]
        ];
        return $a;
    }
    /**
     * split date time piucker range int start date and end date else returnfalse; 
     * @param type $dateString
     * @return boolean
     */
    public function dateSplit( $dateString ){
        
        $dateArr = explode( '-', $dateString);
        if( count($dateArr)!=2 ){ 
            return false;
        }          
        $startDate = $dateArr[0];
        $endDate   = $dateArr[1];
        $startDateArr = explode("/", $startDate);
        $endDateArr  = explode("/", $endDate);
        
        $startDate = trim($startDateArr[2])."-".trim($startDateArr[0])."-".trim($startDateArr[1]) ;
        $endDate = trim($endDateArr[2])."-".trim($endDateArr[0])."-".trim($endDateArr[1]) ;
        return array( "startDate" => $startDate, "endDate" => $endDate);
        
    }
    /**
     * 
     * @param string $html
     */
    public function generatePdf($html,$invoice_number=''){
//echo '<pre>';print_r($html);die;
       //$html = '<html><body> here</body></html>';
        require_once  (ROOT . DS . 'vendor' .DS. "mpdf". DS ."vendor". DS."autoload.php");
//       ROOT.'vendor/mpdf/vendor/autoload.php';
        if($invoice_number!=''){
            $invoice_number=$invoice_number;
        } else {
            $invoice_number=date('HmdHis');
        }
        $mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
        $mpdf->WriteHTML(file_get_contents(ROOT . DS .'webroot'.DS.'css'.DS.'bootstrap.css'), 1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($invoice_number.'.pdf', 'I');


    }
}
