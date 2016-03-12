<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Municipio Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $uf
 * @property int $codi_estd
 * @property string $desc_estd
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Municipio extends Entity
{

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
        '*' => true,
        'id' => false,
    ];

    /**
     * Retorna o Esquema
     *
     * @return  array;
     */
     public function getEsquema() {
       $esquema = [
         'id'        => [
           'titulo'  => 'Código',
         ],
         'nome'      => [
           'titulo'  => 'Nome',
           'sort'    => true,
         ],
         'uf'       => [
           'titulo' => 'UF'
         ],
         'codi_estd'=> [
           'titulo' => 'Código do Estado'
         ],
         'desc_estd' => [
           'titulo'   => 'Estado'
         ],
       ];
       return $esquema;
     }
}
