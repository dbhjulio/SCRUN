<?php
/**
 * Component Crud
 */
namespace CrudMoura\Controller\Component;
use Cake\Controller\Component;
use Cake\Event\Event;

//use Cake\Routing\Router;

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

        // descobrindo a url do site completa
        $site = $this->_Controller->request->env('REQUEST_SCHEME')
            .'://'.$this->_Controller->request->env('HTTP_HOST')
            .$this->_Controller->request->base;
        $cadastro = '';
        if (isset($this->_Controller->request->params['plugin'])) {
            $cadastro .= $this->_Controller->request->params['plugin'];
        }
        $cadastro .= $this->_Controller->request->params['controller'];

		// populando o controller e a view com os dados do site e cadastro corrente.
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
 * Exibe a tela inicial do cadastro corrente.
 *
 * @return 	void
 */
public function index() {
		// variáveis locais
    $modelClass 	= $this->_Controller->modelClass;
		$entidade 		= $this->_Controller->$modelClass->newEntity();
		$tituloPagina = 'Listando '.$this->_Controller->name;
		$tituloLista 	= 'Listando '.$this->_Controller->name;
		$listFields 	= [];
		$esquemas 		= [];
		$containers 	= [];
		$ordem 				= ['Municipios.nome'=>'DESC'];
		$menu 				= true;
		$pagina 			= 1;
		$limite 			= 10;
		$esquemas[$modelClass] = $entidade->getEsquema();

		// configurando a ordem
		$ordem = isset($this->request->query['sort'])
			? $this->request->query['sort']
			: null;

		// configurando a direção
		$direcao = isset($this->request->query['direction'])
			? $this->request->query['direction']
			: 'ASC';

		// recuperando os relacionamentos
		$associacoes = $this->_Controller->$modelClass->associations()->keys();
		if (!empty($associacoes)) {
			foreach($associacoes as $_l => $_associacao) {
				$associacao = ucfirst($_associacao);
				$containers[] = $this->_Controller->$modelClass->$associacao->alias();
				$entidade 	= $this->_Controller->$modelClass->$associacao->newEntity();
				if (method_exists($entidade,'getEsquema')) {
					$esquemas[$associacao] = $entidade->getEsquema();
				}
			}
		}

		// recuperando a página
		$query = $this->_Controller->$modelClass->find()
		->contain($containers)
		->order([$ordem=>$direcao]);
		$this->_Controller->paginate['limit'] = $limite;
		$this->_Controller->paginate['page'] 	= $pagina;
		$this->_Controller->request->data = $this->_Controller->paginate($query);

		// recuperando os campos de exibição
		foreach($esquemas as $_Model => $_arrCmps) {
			foreach($_arrCmps as $_cmp => $_arrProp) {
				if (!in_array($_cmp,array('id'))) {
					$listFields[] = $_Model.'.'.$_cmp;
				}
			}
		}

		// recuperando as opções de menu da esquerda
		if ($menu) {
			$menuEsquerdo['Cadastros']['0']['label'] 	= 'Usuários';
			$menuEsquerdo['Cadastros']['0']['base'] 	= $this->_Controller->request->base;
			$menuEsquerdo['Cadastros']['0']['link'] 	= '/usuarios';

			$menuEsquerdo['Cadastros']['1']['label'] 	= 'Perfis';
			$menuEsquerdo['Cadastros']['1']['base'] 	= $this->_Controller->request->base;
			$menuEsquerdo['Cadastros']['1']['link'] 	= '/perfis';

			$menuEsquerdo['Cadastros']['2']['label'] 	= 'Municípios';
			$menuEsquerdo['Cadastros']['2']['base'] 	= $this->_Controller->request->base;
			$menuEsquerdo['Cadastros']['2']['link'] 	= '/municipios';

			$menuEsquerdo['Opções']['1']['label'] = 'Backup';
			$menuEsquerdo['Opções']['1']['base'] 	= $this->_Controller->request->base;
			$menuEsquerdo['Opções']['1']['link'] 	= '/backup';

			$menuEsquerdo['Opções']['2']['label'] = 'Importação';
			$menuEsquerdo['Opções']['2']['base'] 	= $this->_Controller->request->base;
			$menuEsquerdo['Opções']['2']['link'] 	= '/importacao';
		}

		// definindo o layout padrão e caminho da view
		$this->_Controller->viewBuilder()->templatePath('Element')->plugin('CrudMoura');

		// populando a view
		$this->_Controller->request->listFields = $listFields;
		$this->_Controller->request->esquemas 	= $esquemas;
		$this->_Controller->viewVars['varJS']['base'] = "'".$this->request->base."'";
		//$this->_Controller->viewVars['headJquery'][] = "console.log('head jquery')";
		$this->_Controller->set(compact('tituloPagina','tituloLista','menuEsquerdo'));
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
		$tituloPagina 	= 'Editando '.$this->_Controller->name;
		$tituloEdicao 	= 'Editando '.$this->_Controller->name;
    $modelClass 		= $this->_Controller->modelClass;
    $retorno    		= ['action'=>'index'];
    $containers 		= [];

		// definindo o layout padrão e caminho da view
    //$this->_Controller->viewBuilder()->layout('CrudMoura.admin');
		$this->_Controller->viewBuilder()->templatePath('Element')->plugin('CrudMoura');

    // recuperando o esquema

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
    $tituloPagina = 'Editanto '.$this->_Controller->name;
    $this->_Controller->set(compact('tituloEdicao','tituloPagina','_serialize','modelClass','nomeEntidade'));
}

/**
 * Exibe a resposta json
 *
 * @return  void
 */
public function respostaJson() {
	// definindo o layout padrão e caminho da view
  //$this->_Controller->viewBuilder()->layout('CrudMoura.admin');
	$this->_Controller->viewBuilder()->templatePath('Element')->plugin('CrudMoura');
		$resposta = $this->_Controller->Session->check('Resposta.Json')
        ? $this->_Controller->Session->check('Resposta.Json')
        : array();

    $this->_Controller->set(compact('resposta'));
	}
}
