<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $municipio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $municipio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Municipios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="municipios form large-9 medium-8 columns content">
    <?= $this->Form->create($municipio) ?>
    <fieldset>
        <legend><?= __('Edit Municipio') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('uf');
            echo $this->Form->input('codi_estd');
            echo $this->Form->input('desc_estd');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
