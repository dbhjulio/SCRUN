<?php
    echo $this->Html->css('usuarios',['inline'=>false]);
    $this->Html->scriptStart(['block' => true]);
    echo "$(document).ready(function(){
        $('#usuarios-email').focus();
    });";
    $this->Html->scriptEnd();
?>

<br /><br /><br /><br />
<div class='row-fluid fundo1 redondo10 borda2 pad10 wid500'>
    <?= $this->Form->create('Usuario',['url'=>['action'=>'enviar_senha']]); ?>

    <div class='top10'>
        <strong>Entre com seu e-mail:</strong>
    </div>
    <div>
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
