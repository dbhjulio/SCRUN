<?php
    echo $this->Html->script('usuarios_novo_assinante',['inline'=>false]);
?>
<br /><br /><br /><br />
<div class="wid500 fundo1 pad10">
    <?= $this->Form->create(); ?>
    <div>
        <p>Entre com eu e-mail para se cadatrar. Você receberá um e-mail
            para continuar o cadastro.</p>
    <?= $this->Form->input('Usuarios.email',['class'=>'form-control','label'=>false,'placeholder'=>'e-mail']); ?>
    </div>

    <div class='row-fluid top15'>
        <div class='col-md-2'>
        <?= $this->Form->input('Enviar',[
            'type'  => 'button',
            'label' => false,
            'id'    => 'btEnviar',
            'class' => 'btn btn-primary']); ?>
        </div>
        <div class='col-md-10'>
        <?= $this->Form->input('Fechar',[
            'type'  => 'button',
            'label' => false,
            'id'    => 'btFechar',
            'onclick'=>'document.location.href=\''.$this->request->site.'/'.$this->request->cadastro.'/login\'',
            'class' => 'btn btn-close']); ?>
        </div>
    </div>

    <?= $this->Form->end(); ?>
</div>
