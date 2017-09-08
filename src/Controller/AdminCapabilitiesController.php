<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdminCapabilities Controller
 *
 * @property \App\Model\Table\AdminCapabilitiesTable $AdminCapabilities
 *
 * @method \App\Model\Entity\AdminCapability[] paginate($object = null, array $settings = [])
 */
class AdminCapabilitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $adminCapabilities = $this->paginate($this->AdminCapabilities);

        $this->set(compact('adminCapabilities'));
        $this->set('_serialize', ['adminCapabilities']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin Capability id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminCapability = $this->AdminCapabilities->get($id, [
            'contain' => ['RoleAdminCapabilities']
        ]);

        $this->set('adminCapability', $adminCapability);
        $this->set('_serialize', ['adminCapability']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminCapability = $this->AdminCapabilities->newEntity();
        if ($this->request->is('post')) {
            $adminCapability = $this->AdminCapabilities->patchEntity($adminCapability, $this->request->getData());
            if ($this->AdminCapabilities->save($adminCapability)) {
                $this->Flash->success(__('The admin capability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin capability could not be saved. Please, try again.'));
        }
        $this->set(compact('adminCapability'));
        $this->set('_serialize', ['adminCapability']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin Capability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminCapability = $this->AdminCapabilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminCapability = $this->AdminCapabilities->patchEntity($adminCapability, $this->request->getData());
            if ($this->AdminCapabilities->save($adminCapability)) {
                $this->Flash->success(__('The admin capability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin capability could not be saved. Please, try again.'));
        }
        $this->set(compact('adminCapability'));
        $this->set('_serialize', ['adminCapability']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin Capability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminCapability = $this->AdminCapabilities->get($id);
        if ($this->AdminCapabilities->delete($adminCapability)) {
            $this->Flash->success(__('The admin capability has been deleted.'));
        } else {
            $this->Flash->error(__('The admin capability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
