<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoleAdminCapabilities Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\AdminCapabilitiesTable|\Cake\ORM\Association\BelongsTo $AdminCapabilities
 *
 * @method \App\Model\Entity\RoleAdminCapability get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoleAdminCapability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RoleAdminCapability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoleAdminCapability|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoleAdminCapability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoleAdminCapability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoleAdminCapability findOrCreate($search, callable $callback = null, $options = [])
 */
class RoleAdminCapabilitiesTable extends Table
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

        $this->setTable('role_admin_capabilities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AdminCapabilities', [
            'foreignKey' => 'admin_capability_id',
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
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['admin_capability_id'], 'AdminCapabilities'));

        return $rules;
    }
}