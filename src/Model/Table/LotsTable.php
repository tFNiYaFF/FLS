<?php
namespace App\Model\Table;

use Cake\Database\Schema\TableSchema;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lots Model
 *
 * @property \App\Model\Table\BetsTable|\Cake\ORM\Association\HasMany $Bets
 * @property \App\Model\Table\ChoisesTable|\Cake\ORM\Association\HasMany $Choises
 *
 * @method \App\Model\Entity\Lot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lot findOrCreate($search, callable $callback = null, $options = [])
 */
class LotsTable extends Table
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
        $this->setTable('lots');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Bets', [
            'foreignKey' => 'lot_id'
        ]);
        $this->hasMany('Choises', [
            'foreignKey' => 'lot_id'
        ]);
    }

    protected function _initializeSchema(TableSchema $schema)
    {
        $schema->columnType('deadline', 'datetime');
        return $schema;
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
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->dateTime('deadline')
            ->allowEmpty('deadline');

        $validator
            ->scalar('logo')
            ->allowEmpty('logo');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('user')
            ->allowEmpty('user');

        return $validator;
    }
}
