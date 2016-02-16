<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Controller Fhater of All
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
/**
 * Inicialização do AppController
 * @return void
 */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('CrudMoura.Crud');
    }

/**
 * Exibe a tela inicial do cadastro corrente
 *
 * @return  void
 */
    public function index() {
        $this->Crud->index();
    }

/**
 * Exibe a tela de edição do cadastro corrente.
 *
 * @return  void
 */
    public function editar($id=0) {
        $this->Crud->editar($id);
    }

/**
 * Exibe a tela de inclusão do cadastro corrente.
 *
 * @return  void
 */
    public function novo() {
        $this->Crud->novo();
    }

/**
 * Exibe a tela de exclusão do cadastro corrente.
 *
 * @return  void
 */
    public function excluir($id=0) {
        $this->Crud->excluir($id);
    }

}
