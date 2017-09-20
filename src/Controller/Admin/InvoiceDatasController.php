<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;

/**
 * InvoiceDatas Controller
 *
 * @property \App\Model\Table\InvoiceDatasTable $InvoiceDatas
 *
 * @method \App\Model\Entity\InvoiceData[] paginate($object = null, array $settings = [])
 */
class InvoiceDatasController extends AdminAppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->layout('admin_layout');
        $dateRange = isset($_GET["date_from"]) ? $_GET["date_from"] : "";
        $conditions = [];
        if ($dateRange != '') {
            $dateRangeArr = $this->dateSplit($dateRange);
            if (isset($dateRangeArr["startDate"]) && isset($dateRangeArr["endDate"])) {
                $conditions = [
                        'date >= ' => $dateRangeArr["startDate"],
                        'date <= ' => $dateRangeArr["endDate"]
                ];
            }
        }
        if (!empty($_GET['district'])) {
            $conditions['district'] = addslashes(trim($_GET['district']));
        }
        $condition['conditions']=$conditions;
        //print_r($dateRangeArr);die;
        $this->paginate = array_merge([
            'contain' => ['Statuses']
                ], $condition);
        $invoiceDatas = $this->paginate($this->InvoiceDatas);
//        $conditions['district'] = $_GET['district'];
        $districtList = $this->__getDistrictList();
        $this->set(compact('invoiceDatas','conditions','districtList'));
        $this->set('_serialize', ['invoiceDatas']);
        $this->set('title', 'Past Invoice');
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $invoiceData = $this->InvoiceDatas->get($id, [
            'contain' => ['Statuses']
        ]);

        $this->set('invoiceData', $invoiceData);
        $this->set('_serialize', ['invoiceData']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $dataArr = $this->__getInvoiceData();
        $invoiceData = $this->InvoiceDatas->newEntity();
        if ($this->request->is('post')) {
            $startingPoint = implode(',', array_filter([
                $this->request->data['starting_point1'],
                $this->request->data['starting_point2'],
                $this->request->data['starting_point3'],
                $this->request->data['starting_point4']
            ]));
            $endpoint = implode(',', array_filter([
                $this->request->data['ending_point1'],
                $this->request->data['ending_point2'],
                $this->request->data['ending_point3'],
                $this->request->data['ending_point4']
            ]));
            $this->request->data['starting_point']=$startingPoint;
            $this->request->data['ending_point']=$endpoint;
            $invoiceData = $this->InvoiceDatas->patchEntity($invoiceData, $this->request->getData());
            $this->loadModel('Invoices');
            
            
//            $POST=$this->Invoices->patchEntities($new,$post);
            $invoiceData->creation_date=date('Y-m-d H:i:s');
            $checkS= $this->Invoices->find('all',[
                'fields'=>['id'],
                'conditions'=>['invoice_data'=>$startingPoint]
            ])->first();
            $checkE= $this->Invoices->find('all',[
                'fields'=>['id'],
                'conditions'=>['invoice_data'=>$endpoint]
            ])->first();
            $post=[];
            if(empty($checkE) && empty($checkS)){
                $post=[
                    [
                        'invoice_key'=>'startingpoint',
                        'invoice_data'=>$startingPoint,
                        'reg_date'=>date('Y-m-d H:i:s')
                    ],
                    [
                        'invoice_key'=>'startingpoint',
                        'invoice_data'=>$endpoint,
                        'reg_date'=>date('Y-m-d H:i:s')
                    ]
                ];
            } else if(!empty($checkE) && empty($checkS)){
                $post=[
                    [
                        'invoice_key'=>'startingpoint',
                        'invoice_data'=>$endpoint,
                        'reg_date'=>date('Y-m-d H:i:s')
                    ]
                ];
            } else if(empty($checkE) && !empty($checkS)){
                $post=[
                    [
                        'invoice_key'=>'startingpoint',
                        'invoice_data'=>$startingPoint,
                        'reg_date'=>date('Y-m-d H:i:s')
                    ]
                ];
            }
            if(!empty($post)){
                $new=$this->Invoices->newEntities($post);
                $this->Invoices->saveMany($new);
            }
            $checkI= $this->InvoiceDatas->find('all',[
                'fields'=>['id'],
                'conditions'=>['invoice_number'=>$this->request->getData('invoice_number')]
            ])->first();
            if(!empty($checkI)){
                $id=$checkI->id;
            } else {
                if ($this->InvoiceDatas->save($invoiceData)) {
                    $id=$invoiceData->id;
//                    $this->Flash->success(__('The invoice data has been saved.'));

//                    return $this->redirect(['action' => 'index']);
                }
            }
            if($id!=''){
                ?>
                <script>
                    cart_window = window.open("<?=$this->redirect(['action' => 'generateInvoice',$id])?>");
                    cart_window.close();
                </script>
<!--                <script type="text/javascript">
                    window.open('<?=$this->redirect(['action' => 'generateInvoice',$id])?>', '_blank', "");
                </script>     -->
                <?php 
            }
            
            $this->Flash->error(__('The invoice data could not be saved. Please, try again.'));
        }
        $statuses = $this->InvoiceDatas->Statuses->find('list', ['limit' => 2,'conditions'=>['id IN '=>[1,2]]])->toArray();
//        $this->__printData($statuses);
        $districtList= $this->__getDistrictPincodePriceList();
        $this->set(compact('invoiceData', 'statuses','districtList','dataArr'));
        $this->set('_serialize', ['invoiceData']);
        $this->set('title','Create Invoice');
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $invoiceData = $this->InvoiceDatas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceData = $this->InvoiceDatas->patchEntity($invoiceData, $this->request->getData());
            if ($this->InvoiceDatas->save($invoiceData)) {
                $this->Flash->success(__('The invoice data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice data could not be saved. Please, try again.'));
        }
        $districtList= $this->__getDistrictPincodePriceList();
        $dataArr = $this->__getInvoiceData();
        $statuses = $this->InvoiceDatas->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('invoiceData', 'statuses','districtList','dataArr'));
        $this->set('_serialize', ['invoiceData']);
        $this->set('title','Edit Invoice');
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceData = $this->InvoiceDatas->get($id);
        if ($this->InvoiceDatas->delete($invoiceData)) {
            $this->Flash->success(__('The invoice data has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * annexure method
     *
     * @return \Cake\Http\Response|void
     */
    public function annexure() {
        $dateRange = isset($_GET["date_from"]) ? $_GET["date_from"] : "";
        $conditions = [];
        if ($dateRange != '') {
            $dateRangeArr = $this->dateSplit($dateRange);
            if (isset($dateRangeArr["startDate"]) && isset($dateRangeArr["endDate"])) {
                $conditions = [
                    'date >= ' => $dateRangeArr["startDate"],
                    'date <= ' => $dateRangeArr["endDate"]
                ];
            }
        }
        if (!empty($_GET['district'])) {
            $conditions['district'] = addslashes(trim($_GET['district']));
        }
        $condition=[];
        if(!empty($conditions)){
            $condition['conditions']=$conditions;
            $this->paginate = array_merge([
                'contain' => ['Statuses']
            ], $condition);
            $invoiceDatas = $this->paginate($this->InvoiceDatas);                       
        } else {
            $invoiceDatas=[];
        }
        $districtList = $this->__getDistrictList(); 
        $this->set(compact('invoiceDatas', 'districtList','conditions'));
        $this->set('_serialize', ['invoiceDatas']);
        $this->set('title', 'Generate Annexure');
    }

    public function generateInvoice($id = 0) {
        // echo  ROOT . DS .'webroot/css/bootstrap.css';die;
        $rec = $this->InvoiceDatas->get($id)->toArray();
//        $this->__printData($rec);
        $this->viewBuilder()->layout('');
        $this->set("invoiceData", $rec);
        $html = $this->render("/Admin/Element/past_invoice");
        // echo "here".$html;die;
        //  $html="<html><body>pdf demo</body></html>";
        $this->generatePdf($html,$rec['invoice_number']);
        die;
    }
    
    public function generateAnnexure(){
		
        if(!empty($_GET['conditions'])){
            $condition['conditions']= json_decode($_GET['conditions'],true);
            $data=$this->InvoiceDatas->find('all',$condition)->toArray();
			if(empty($data)){
				$this->Flash->success(__('There is no record found for these searching keywords.'));
				return $this->redirect(['action' => 'annexure']);
			}
            $this->viewBuilder()->layout('');
            $districtFlag=!empty($condition['conditions']['district'])?true:false;
            $this->set("data", $data);
            $this->set("districtFlag", $districtFlag);
            $html = $this->render("/Admin/Element/generate_annexure");
            $this->generatePdf($html);
            die;
        }
        exit;
    }
    
    private function __getInvoiceData(){
        $conn = ConnectionManager::get('default');
        $abc=$conn->query('SET SESSION group_concat_max_len = 100000;');
        $this->loadModel('Invoices');
        $data= $this->Invoices->find('all',[
            'fields'=>[
                'invoiceKey'=>'invoice_key',
                'data'=>"group_concat( DIstinct invoice_data SEPARATOR '===')"
            ],
            'group'=>['invoice_key'],
            'conditions'=>[
                'invoice_key'=>'startingpoint'
            ]
        ])->toArray();
        return $data;
    }

}
