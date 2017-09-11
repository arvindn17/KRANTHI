<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;

/**
 * RoleAdminCapabilities Controller
 *
 * @property \App\Model\Table\RoleAdminCapabilitiesTable $RoleAdminCapabilities
 *
 * @method \App\Model\Entity\RoleAdminCapability[] paginate($object = null, array $settings = [])
 */
class RoleAdminCapabilitiesController extends AdminAppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'AdminCapabilities']
        ];
        $roleAdminCapabilities = $this->paginate($this->RoleAdminCapabilities);

        $this->set(compact('roleAdminCapabilities'));
        $this->set('_serialize', ['roleAdminCapabilities']);
    }

    /**
     * View method
     *
     * @param string|null $id Role Admin Capability id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roleAdminCapability = $this->RoleAdminCapabilities->get($id, [
            'contain' => ['Roles', 'AdminCapabilities']
        ]);

        $this->set('roleAdminCapability', $roleAdminCapability);
        $this->set('_serialize', ['roleAdminCapability']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roleAdminCapability = $this->RoleAdminCapabilities->newEntity();
        if ($this->request->is('post')) {
            $check= $this->RoleAdminCapabilities->find('all',[
                'fields'=>['id'],
                'conditions'=>[
                    'role_id'=> $this->request->getData('role_id'),
                    'admin_capability_id'=> $this->request->getData('admin_capability_id'),
                ]
            ])->first();
            if(empty($check)){
                $roleAdminCapability = $this->RoleAdminCapabilities->patchEntity($roleAdminCapability, $this->request->getData());
                if ($this->RoleAdminCapabilities->save($roleAdminCapability)) {
                    $this->Flash->success(__('The role admin capability has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The role admin capability could not be saved. Please, try again.'));
            } else {
                $this->Flash->success(__('This capability is already linked to this role.'));
            }
            
        }
        $roles = $this->RoleAdminCapabilities->Roles->find('list', ['limit' => 200]);
        $adminCapabilities = $this->RoleAdminCapabilities->AdminCapabilities->find('list', ['limit' => 200]);
        $this->set(compact('roleAdminCapability', 'roles', 'adminCapabilities'));
        $this->set('_serialize', ['roleAdminCapability']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role Admin Capability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roleAdminCapability = $this->RoleAdminCapabilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roleAdminCapability = $this->RoleAdminCapabilities->patchEntity($roleAdminCapability, $this->request->getData());
            if ($this->RoleAdminCapabilities->save($roleAdminCapability)) {
                $this->Flash->success(__('The role admin capability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role admin capability could not be saved. Please, try again.'));
        }
        $roles = $this->RoleAdminCapabilities->Roles->find('list', ['limit' => 200]);
        $adminCapabilities = $this->RoleAdminCapabilities->AdminCapabilities->find('list', ['limit' => 200]);
        $this->set(compact('roleAdminCapability', 'roles', 'adminCapabilities'));
        $this->set('_serialize', ['roleAdminCapability']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role Admin Capability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roleAdminCapability = $this->RoleAdminCapabilities->get($id);
        if ($this->RoleAdminCapabilities->delete($roleAdminCapability)) {
            $this->Flash->success(__('The role admin capability has been deleted.'));
        } else {
            $this->Flash->error(__('The role admin capability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
