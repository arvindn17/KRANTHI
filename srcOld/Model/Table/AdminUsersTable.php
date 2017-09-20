<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminUsers Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\AdminUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdminUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdminUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdminUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser findOrCreate($search, callable $callback = null, $options = [])
 */
class AdminUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'creation_date' => 'new',
                    'modification_date' => 'always'
                ]
            ]
        ]);
        $this->setTable('admin_users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->dateTime('creation_date')
            ->requirePresence('creation_date', 'create')
            ->notEmpty('creation_date');

        $validator
            ->dateTime('modification_date')
            ->allowEmpty('modification_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
    
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query->select([
            'id', 'name', 'email', 'password', 'role_id', 'role'=>'Roles.role', 'admin_capabilities'=>'group_concat(AdminCapabilities.slug)'
        ])->contain('Roles')->leftJoin([
            'RoleAdminCapabilities' => $this->Roles->RoleAdminCapabilities->table()
        ], [
            'RoleAdminCapabilities.role_id = AdminUsers.role_id'
        ])->leftJoin([
            'AdminCapabilities' => $this->Roles->RoleAdminCapabilities->AdminCapabilities->table()
        ], [
            'AdminCapabilities.id = RoleAdminCapabilities.admin_capability_id'
        ])->group('AdminUsers.id');
        
        return $query;
    }
}
