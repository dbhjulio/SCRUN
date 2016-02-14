<?php
namespace App\Model\Table;

use App\Model\Entity\Municipio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Municipios Model
 *
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class MunicipiosTable extends Table
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

        $this->table('municipios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Usuarios', [
            'foreignKey' => 'municipio_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('uf', 'create')
            ->notEmpty('uf');

        $validator
            ->integer('codi_estd')
            ->requirePresence('codi_estd', 'create')
            ->notEmpty('codi_estd');

        $validator
            ->requirePresence('desc_estd', 'create')
            ->notEmpty('desc_estd');

        return $validator;
    }
}
