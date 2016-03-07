<?php
namespace App\Model\Table;

use App\Model\Entity\Perfi;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Perfis Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Urls
 * @property \Cake\ORM\Association\BelongsToMany $Usuarios
 */
class PerfisTable extends Table
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

        $this->table('perfis');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->entityClass('App\Model\Entity\Perfil');

        /*$this->belongsToMany('Url', [
            'foreignKey' => 'perfil_id',
            'targetTable' => 'urls',
            'targetForeignKey' => 'url_id',
            'joinTable' => 'perfis_urls'
        ]);*/
        $this->belongsToMany('Usuario', [
            'className' => 'Usuarios',
            'foreignKey' => 'perfil_id',
            'targetForeignKey' => 'usuario_id',
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

        return $validator;
    }
}
