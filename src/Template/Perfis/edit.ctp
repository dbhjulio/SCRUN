<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $perfi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Urls'), ['controller' => 'Urls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Url'), ['controller' => 'Urls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="perfis form large-9 medium-8 columns content">
    <?= $this->Form->create($perfi) ?>
    <fieldset>
        <legend><?= __('Edit Perfi') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('urls._ids', ['options' => $urls]);
            echo $this->Form->input('usuarios._ids', ['options' => $usuarios]);
            echo $this->Form->input('us._ids', ['options' => $us]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
