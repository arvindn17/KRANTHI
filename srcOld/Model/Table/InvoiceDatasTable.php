<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceDatas Model
 *
 * @property \App\Model\Table\StatusesTable|\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\InvoiceData get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoiceData newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvoiceData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceData|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceData[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceData findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoiceDatasTable extends Table
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
        $this->setTable('invoice_datas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('district')
            ->requirePresence('district', 'create')
            ->notEmpty('district');

        $validator
            ->scalar('pincode')
            ->requirePresence('pincode', 'create')
            ->notEmpty('pincode');

        $validator
            ->scalar('invoice_number')
            ->requirePresence('invoice_number', 'create')
            ->notEmpty('invoice_number')
            ->add('invoice_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('vehicle_number')
            ->requirePresence('vehicle_number', 'create')
            ->notEmpty('vehicle_number');

        $validator
            ->scalar('starting_reding')
            ->requirePresence('starting_reding', 'create')
            ->notEmpty('starting_reding');

        $validator
            ->scalar('ending_reding')
            ->requirePresence('ending_reding', 'create')
            ->notEmpty('ending_reding');

        $validator
            ->scalar('number_of_kilometers')
            ->requirePresence('number_of_kilometers', 'create')
            ->notEmpty('number_of_kilometers');

        $validator
            ->scalar('number_of_animals')
            ->requirePresence('number_of_animals', 'create')
            ->notEmpty('number_of_animals');

        $validator
            ->numeric('rupees_per_kilometer')
            ->requirePresence('rupees_per_kilometer', 'create')
            ->notEmpty('rupees_per_kilometer');

        $validator
            ->numeric('total_amount')
            ->requirePresence('total_amount', 'create')
            ->notEmpty('total_amount');

        $validator
            ->scalar('starting_point')
            ->allowEmpty('starting_point');

        $validator
            ->scalar('ending_point')
            ->allowEmpty('ending_point');

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
        $rules->add($rules->isUnique(['invoice_number']));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
}
