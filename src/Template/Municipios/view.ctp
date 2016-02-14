<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Municipio'), ['action' => 'edit', $municipio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Municipio'), ['action' => 'delete', $municipio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Municipios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Municipio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="municipios view large-9 medium-8 columns content">
    <h3><?= h($municipio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($municipio->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Uf') ?></th>
            <td><?= h($municipio->uf) ?></td>
        </tr>
        <tr>
            <th><?= __('Desc Estd') ?></th>
            <td><?= h($municipio->desc_estd) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($municipio->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Codi Estd') ?></th>
            <td><?= $this->Number->format($municipio->codi_estd) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($municipio->usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Municipio Id') ?></th>
                <th><?= __('Senha') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Criado') ?></th>
                <th><?= __('Modificado') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($municipio->usuarios as $usuarios): ?>
            <tr>
                <td><?= h($usuarios->id) ?></td>
                <td><?= h($usuarios->nome) ?></td>
                <td><?= h($usuarios->email) ?></td>
                <td><?= h($usuarios->municipio_id) ?></td>
                <td><?= h($usuarios->senha) ?></td>
                <td><?= h($usuarios->status) ?></td>
                <td><?= h($usuarios->criado) ?></td>
                <td><?= h($usuarios->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
