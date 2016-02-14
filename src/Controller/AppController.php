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
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        // definindo o layout padrão
        $this->viewBuilder()->layout('publico');

        // descobrindo a url do site completa
        $site = $this->request->env('REQUEST_SCHEME')
            .'://'.$this->request->env('HTTP_HOST')
            .$this->request->base;
        $cadastro = '';
        if (isset($this->request->params['plugin'])) {
            $cadastro .= $this->request->params['plugin'];
        }
        $cadastro .= $this->request->params['controller'];
        $this->request->site = $site;
        $this->request->cadastro = strtolower($cadastro);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * Exibe a resposta json
     *
     * @return  void
     */
    public function respostaJson() {
        $resposta = $this->Session->check('Resposta.Json')
            ? $this->Session->check('Resposta.Json')
            : array();
        $this->set(compact('resposta'));
        $this->viewBuilder()->layout('ajax');
    }

}
