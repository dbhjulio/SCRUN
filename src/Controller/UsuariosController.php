<?php
namespace App\Controller;
use App\Controller\AppController;
/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController {

public function initialize()
   {
       parent::initialize();
       $this->loadComponent('Paginator');
   }

/**
 * Exibe a pagina inicial do cadastro de Usuários
 *
 * @return  void
 */
  public function index() {
    parent::index();
    $this->request->listFields = ['Usuario.nome'
      ,'Usuario.email','Usuario.status'
      ,'Municipio.nome'
      ,'Usuario.modificado','Usuario.criado'];
    $this->request->esquemas['Municipio']['nome']['titulo'] = 'Município';
  }

    /**
     * Exibe a tela de login
     */
    public function login () {
        //
    }

    /**
     * Exibe a tela de resetar a senha
     */
    public function resetarSenha () {
        //
    }

    /**
     * Exibe a tela de envio de senha
     */
    public function enviarSenha () {
        $this->viewBuilder()->layout('ajax');

        $retorno['status']  = true;
        $retorno['msg']     = "Verifique seu e-mail para recuperar a senha";
        $this->set(compact('retorno'));
    }

    /**
     * Exibe a tela de pedido de nova Assinatura.
     *
     * @param   string  $email  E-mail para nova assinatura
     * @return  void
     */
    public function novoAssinante() {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $resposta['status'] = true;
                $resposta['msg']    = 'O Assinatura foi criada com sucesso, verifique seu e-mail para ativá-la.';
            } else {
                $resposta['status'] = false;
                $resposta['msg']    = 'Não foi possível criar assinatura';
            }
            $this->Session->write('Resposta.Json',$resposta);
            return $this->redirect(['action' => 'resposta_json']);
        }

    }

    /**
     *
     */
    public function ativarAssinante() {
        //
    }

    /**
     * Exibe a tela dashboard
     */
    public function painel () {
        //
    }
}
