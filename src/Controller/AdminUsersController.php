<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdminUsers Controller
 *
 * @property \App\Model\Table\AdminUsersTable $AdminUsers
 *
 * @method \App\Model\Entity\AdminUser[] paginate($object = null, array $settings = [])
 */
class AdminUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $adminUsers = $this->paginate($this->AdminUsers);

        $this->set(compact('adminUsers'));
        $this->set('_serialize', ['adminUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('adminUser', $adminUser);
        $this->set('_serialize', ['adminUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminUser = $this->AdminUsers->newEntity();
        if ($this->request->is('post')) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());
            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $roles = $this->AdminUsers->Roles->find('list', ['limit' => 200]);
        $this->set(compact('adminUser', 'roles'));
        $this->set('_serialize', ['adminUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());
            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $roles = $this->AdminUsers->Roles->find('list', ['limit' => 200]);
        $this->set(compact('adminUser', 'roles'));
        $this->set('_serialize', ['adminUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminUser = $this->AdminUsers->get($id);
        if ($this->AdminUsers->delete($adminUser)) {
            $this->Flash->success(__('The admin user has been deleted.'));
        } else {
            $this->Flash->error(__('The admin user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
