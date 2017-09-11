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
        
        $this->viewBuilder()->layout('admin_default');
        
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
        switch ($this->name) { 
            case 'Products':
                $this->Auth->allow(['addProductQuickEnquiry','editProductQuickEnquiry','addProductImage','uploadProductImages','copyImage',
                    'deleteProductFromQuickEntryPage']);
                break;
            case 'AdminAjax' :
                $this->Auth->allow(['getProductSizeList','getCategoryList','getNewProductCategoryRow','getProductAttributeList',
                    'getNewProductVendorRow','getProductList','uploadProductImage','getProductListForEnquiry','addProductImages',
                    'getNewProductSizeRow','addNewProductSizeRow','updateShippingMethod','getShippingCostMethods','getStateByCountry',
                    'saveAddress']);
                break;
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
    
}
