<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Model\CustomClasses\ImageUploader;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Inflector;

class AdminAjaxController extends AdminAppController {
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('ajax');
    }
    
    public function updateStatus(){
        $response=[];
        $success=1;
        $data='';
        if(!empty($this->request->data)){
            $data= TableRegistry::get('InvoiceDatas')->get($this->request->data);
            $data->status_id=2;
            if(TableRegistry::get('InvoiceDatas')->save($data)){
                $success=1;
                $data='Paid';
            }
        }
        echo json_encode([
            'success'=>$success,
            'data'=>$data
        ]);
        exit;
    }
}