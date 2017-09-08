<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminCapabilities Model
 *
 * @property \App\Model\Table\RoleAdminCapabilitiesTable|\Cake\ORM\Association\HasMany $RoleAdminCapabilities
 *
 * @method \App\Model\Entity\AdminCapability get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdminCapability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdminCapability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdminCapability|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdminCapability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdminCapability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdminCapability findOrCreate($search, callable $callback = null, $options = [])
 */
class AdminCapabilitiesTable extends Table
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

        $this->setTable('admin_capabilities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('RoleAdminCapabilities', [
            'foreignKey' => 'admin_capability_id'
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
            ->scalar('slug')
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }
}
