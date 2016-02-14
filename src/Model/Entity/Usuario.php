<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property int $municipio_id
 * @property \App\Model\Entity\Municipio $municipio
 * @property string $senha
 * @property int $status
 * @property \Cake\I18n\Time $criado
 * @property \Cake\I18n\Time $modificado
 * @property \App\Model\Entity\Perfi[] $perfis
 */
class Usuario extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*'     => true,
        'id'    => false,
    ];

    /**
     * Descrição do status
     */
    protected $_status_descricao = ['status_descricao'];

    /**
     * Retorna o valor por extenso do campo Status
     *
     * @return  string;
     */
    protected function _getStatusDescricao() {
        $arrSN = [1=>'Sim', 0=>'Não'];
        return $arrSN[$this->_properties['status']];
    }
}
