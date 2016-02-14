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

    <div class="top10">
    <?= $this->Form->input('Entrar',[
        'type'=>'button',
        'id'=>'btEntrar',
        'label'=>false,
        'required'=>'required',
        'class'=>'btn btn-primary']); ?>
    </div>

    <?= $this->Form->end(); ?>
</div>
