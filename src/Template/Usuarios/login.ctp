<?php
    echo $this->Html->css('usuarios',['inline'=>false]);
    echo $this->Html->script('usuarios_login',['inline'=>false]);
?>
<br />
<center>
    <img src='<?= $this->request->base ?>/img/scrun-p.png' ?>
</center>
<br />
<div id='divLogin' class='container redondo10 borda2 fundo1'>
<?= $this->Form->create(); ?>
    <div>
    <?= $this->Form->input('Usuarios.email',['class'=>'form-control','label'=>false,'placeholder'=>'e-mail']); ?>
    <?= $this->Form->input('Usuarios.senha',['class'=>'form-control','label'=>false,'placeholder'=>'senha','type'=>'password']); ?>
    </div>

    <div class="row-fluid top10">
        <div class="col-md-3">
            <?= $this->Form->input('Entrar',['type'=>'submit','class'=>'btn btn-primary']); ?>
        </div>
        <div class="col-md-9">
            <a href='<?= $this->request->base ?>/usuarios/resetar_senha'>Esqueci a senha</a>
            <br />
            <a href='<?= $this->request->base ?>/usuarios/novo_assinante'>Cadastrar</a>
        </div>
    </div>
<?= $this->Form->end(); ?>
</div><!-- fim login -->
