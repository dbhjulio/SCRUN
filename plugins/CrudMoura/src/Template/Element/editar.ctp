<?php
    echo $this->Html->css('CrudMoura.editar',['inline'=>false]);
    echo $this->Html->script('CrudMoura.editar',['inline'=>false]);
?>
<div class="container-fluid clearfix">
    <div class='row-fluid'>
        <h1><?php echo $tituloEdicao ?></h1>
    </div>

    <div class='row-fluid'>
        ...
    </div>

    <div class='row-fluid'>
        ...
    </div>

</div>

<?php
    pr($this->viewVars[$nomeEntidade]);
?>
