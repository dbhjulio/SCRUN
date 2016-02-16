<?php
/**
 * Component Crud
 */
namespace CrudMoura\Controller\Component;
use Cake\Controller\Component;
use Cake\Event\Event;

class CrudComponent extends Component {
/**
 * Uma referência à intãncia Controller

 * @var Controller class
 */
	protected $_Controller;

/**
 * Inicialização
 *
 * @param Controller $Controller Controller com componentes para inicialização
 * @return void
 */
	public function initialize(array $config) {
        $this->_Controller = $this->_registry->getController();

        // definindo o layout padrão
        $this->_Controller->viewBuilder()->layout('CrudMoura.publico');

        // descobrindo a url do site completa
        $site = $this->_Controller->request->env('REQUEST_SCHEME')
            .'://'.$this->_Controller->request->env('HTTP_HOST')
            .$this->_Controller->request->base;
        $cadastro = '';
        if (isset($this->_Controller->request->params['plugin'])) {
            $cadastro .= $this->_Controller->request->params['plugin'];
        }
        $cadastro .= $this->_Controller->request->params['controller'];
        $this->_Controller->request->site = $site;
        $this->_Controller->request->cadastro = strtolower($cadastro);
	}

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->_Controller->viewVars) &&
            in_array($this->_Controller->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->_Controller->set('_serialize', true);
        }
    }

    /**
     * Exibe a resposta json
     *
     * @return  void
     */
    public function respostaJson() {
        $resposta = $this->_Controller->Session->check('Resposta.Json')
            ? $this->_Controller->Session->check('Resposta.Json')
            : array();
        $this->_Controller->set(compact('resposta'));
        $this->_Controller->viewBuilder()->layout('ajax');
    }

    /**
     * Método Editar
     *
     * @param   string|null     $id Model id.
     * @return \Cake\Network\Response|void  Redireciona em caso de sucesso.
     * @throws \Cake\Network\Exception\NotFoundException Quando o registro não é localizado.
     */
    public function editar($id = null) {
        // variáveis locais
        $modelClass = $this->_Controller->modelClass;
        $retorno    = ['action'=>'index'];
        $containers = [];

        // definindo o layout e o template usar
        $this->_Controller->viewBuilder()->layout('admin')->plugin('CrudMoura');
        $this->_Controller->viewBuilder()->templatePath('Element')->plugin('CrudMoura');

        // recuperando o esquema
        $esquema = $this->_Controller->$modelClass->schema();

        // recuperando as associaçoes
        $associacoes = $this->_Controller->$modelClass->associations();
        $arrAssociacoes = [];
        if (!empty($associacoes)) {
            foreach($associacoes->keys() as $_l => $_key) {
                $associacao = getLastId(get_class($associacoes->get($_key)));
                switch($associacao) {
                    case 'belongstomany':
                        if (!isset($containers['contain'])) {
                            $containers['contain'] = [];
                        }
                        $containers['contain'][] = ucfirst($_key);
                    break;
                }
            }
        }

        // recuperando a entidade
        if (!empty($id)) { // alteraçao
            $entidade = $this->_Controller->$modelClass->get($id,$containers);
        } else {
            $entidade = $this->_Controller->$modelClass->newEntity();
        }
        $nomeEntidade   = getLastId($this->_Controller->$modelClass->entityClass());

        // se o formulário foi postado
        if ($this->_Controller->request->is(['patch', 'post', 'put'])) {
            $entidade = $this->_Controller->$modelClass->patchEntity($entidade, $this->_Controller->request->data);
            if ($this->_Controller->$modelClass->save($entidade)) {
                $this->_Controller->Flash->sucess('O Registro foi salvo com sucesso ...');
                return $this->_Controller->redirect($retorno);
            } else {
                $this->_Controller->Flash->error('Erro ao tentar atualizar registro !!!');
            }
        }

        // atualiazando a view
        $this->_Controller->viewVars[$nomeEntidade] = $entidade;
        $this->_Controller->set(compact('_serialize','modelClass','nomeEntidade'));
    }
}
