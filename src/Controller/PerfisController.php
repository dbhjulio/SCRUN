<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Perfis Controller
 *
 * @property \App\Model\Table\PerfisTable $Perfis
 */
class PerfisController extends AppController {

/**
 *
 */
  public function index() {
    parent::index();
    $this->request->listFields = [];
    $this->request->listFields[] = 'Perfil.nome';
  }
}
