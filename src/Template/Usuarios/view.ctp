<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Municipios'), ['controller' => 'Municipios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Municipio'), ['controller' => 'Municipios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Perfis'), ['controller' => 'Perfis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfi'), ['controller' => 'Perfis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($usuario->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Municipio') ?></th>
            <td><?= $usuario->has('municipio') ? $this->Html->link($usuario->municipio->id, ['controller' => 'Municipios', 'action' => 'view', $usuario->municipio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Senha') ?></th>
            <td><?= h($usuario->senha) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($usuario->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= h($usuario->criado) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h($usuario->modificado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Perfis') ?></h4>
        <?php if (!empty($usuario->perfis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->perfis as $perfis): ?>
            <tr>
                <td><?= h($perfis->id) ?></td>
                <td><?= h($perfis->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Perfis', 'action' => 'view', $perfis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Perfis', 'action' => 'edit', $perfis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Perfis', 'action' => 'delete', $perfis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
