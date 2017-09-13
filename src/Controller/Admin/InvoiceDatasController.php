<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;

/**
 * InvoiceDatas Controller
 *
 * @property \App\Model\Table\InvoiceDatasTable $InvoiceDatas
 *
 * @method \App\Model\Entity\InvoiceData[] paginate($object = null, array $settings = [])
 */
class InvoiceDatasController extends AdminAppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses']
        ];
        $invoiceDatas = $this->paginate($this->InvoiceDatas);

        $this->set(compact('invoiceDatas'));
        $this->set('_serialize', ['invoiceDatas']);
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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
    public function add()
    {
        $invoiceData = $this->InvoiceDatas->newEntity();
        if ($this->request->is('post')) {
            $invoiceData = $this->InvoiceDatas->patchEntity($invoiceData, $this->request->getData());
            if ($this->InvoiceDatas->save($invoiceData)) {
                $this->Flash->success(__('The invoice data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice data could not be saved. Please, try again.'));
        }
        $statuses = $this->InvoiceDatas->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('invoiceData', 'statuses'));
        $this->set('_serialize', ['invoiceData']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
        $statuses = $this->InvoiceDatas->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('invoiceData', 'statuses'));
        $this->set('_serialize', ['invoiceData']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Data id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
    public function annexure()
    {
        $this->paginate = [
            'contain' => ['Statuses']
        ];
        $invoiceDatas = $this->paginate($this->InvoiceDatas);
        $districtList= $this->__getDistrictList();
        $this->set(compact('invoiceDatas','districtList'));
        $this->set('_serialize', ['invoiceDatas']);
        $this->set('title', 'Generate Annexure');
    }
}
