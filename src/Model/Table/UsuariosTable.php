<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Municipios
 * @property \Cake\ORM\Association\BelongsToMany $Perfis
 */
class UsuariosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('usuarios');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->entityClass('App\Model\Entity\Usuario');

        $this->belongsTo('Municipios', [
            'foreignKey' => 'municipio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Perfis', [
            'foreignKey' => 'usuario_id',
            'targetForeignKey' => 'perfil_id',
            'joinTable' => 'perfis_usuarios'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('senha', 'create')
            ->notEmpty('senha','create')
            ->allowEmpty('senha','update');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('criado')
            ->requirePresence('criado', 'create')
            ->notEmpty('criado');

        $validator
            ->dateTime('modificado')
            ->requirePresence('modificado', 'create')
            ->notEmpty('modificado');

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
        $rules->add($rules->existsIn(['municipio_id'], 'Municipios'));
        return $rules;
    }
}
