<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Municipios Controller
 *
 * @property \App\Model\Table\MunicipiosTable $Municipios
 */
class MunicipiosController extends AppController {
/**
 * Exibe a pagina inicial do cadastro de Usuários
 *
 * @return  void
 */
  public function index() {
    $query = $this->Municipios->find();
    $this->paginate['limit'] = 10;
    $this->paginate['page'] = 10;
    $this->paginate['order'] = ['Municipios.nome'=>'DESC'];
    $this->request->data = $this->paginate($query);

    /*parent::index();
    $this->request->listFields = ['Municipios.nome'
    ,'Municipios.uf'
    ,'Municipios.codi_estd'
    ,'Municipios.desc_estd'
  ];*/
  }
}
