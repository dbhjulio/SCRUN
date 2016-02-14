<?php
namespace App\Controller;
use App\Controller\AppController;
/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Municipios']
        ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Municipios', 'Perfis']
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $municipios = $this->Usuarios->Municipios->find('list', ['limit' => 200]);
        $perfis = $this->Usuarios->Perfis->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'municipios', 'perfis'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Perfis']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $municipios = $this->Usuarios->Municipios->find('list', ['limit' => 200]);
        $perfis = $this->Usuarios->Perfis->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'municipios', 'perfis'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Exibe a tela de login
     */
    public function login () {
    }

    /**
     * Exibe a tela de resetar a senha
     */
    public function resetarSenha () {
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

    }

    /**
     * Exibe a tela dashboard
     */
    public function painel () {
        //
    }
}
