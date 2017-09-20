<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;
/**
 * AdminUsers Controller
 *
 * @property \App\Model\Table\AdminUsersTable $AdminUsers
 *
 * @method \App\Model\Entity\AdminUser[] paginate($object = null, array $settings = [])
 */
class AdminUsersController extends AdminAppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles','Statuses']
        ];
        $adminUsers = $this->paginate($this->AdminUsers);

        $this->set(compact('adminUsers'));
        $this->set('_serialize', ['adminUsers']);
        $this->set('title', 'Admin User List');
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
            'contain' => ['Roles','Statuses']
        ]);

        $this->set('adminUser', $adminUser);
        $this->set('_serialize', ['adminUser']);
        $this->set('title', $adminUser->name.' Detail');
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
            $post=$this->request->getData();
            $post['creation_date']=date('Y-m-d H:i:s');
            $adminUser = $this->AdminUsers->patchEntity($adminUser,$post);
            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $roles = $this->AdminUsers->Roles->find('list', ['limit' => 200]);
        $statuses = $this->AdminUsers->Statuses->find('list', ['limit' => 200,'conditions'=>['id IN '=> [3,4]]]);
        $this->set(compact('adminUser', 'roles','statuses'));
        $this->set('_serialize', ['adminUser']);
        $this->set('title', 'Add New Admin');
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
        $statuses = $this->AdminUsers->Statuses->find('list', ['limit' => 200,'conditions'=>['id IN '=> [3,4]]]);
        $this->set(compact('adminUser', 'roles','statuses'));
        $this->set('_serialize', ['adminUser']);
        $this->set('title', 'Edit '.$adminUser->name.' Detail');
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
    
    public function login(){
        if ($this->Auth->user()) {
            $this->redirect($this->Auth->redirectUrl());
        }
        $this->set('title', 'Login');
        $this->viewBuilder()->layout('admin_login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $user['admin_capabilities'] = empty($user['admin_capabilities']) ? [] : explode(",", $user['admin_capabilities']);
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
