<?php
/**
 * Funções do adrianoc
 */

/**
 * Retorna o ultimo id de um array gerada pela string.
 * 
 * @param   string      $id         String a ser convertida em array.
 * @param   string      $s          Sepador.
 * @return  string      $lastId     Último valor do array.
 */
function getLastId($id='', $s='\\') {
    $arrId = explode($s,$id);
    $lastId= strtolower($arrId[count($arrId)-1]);
    return $lastId;
}

?>
