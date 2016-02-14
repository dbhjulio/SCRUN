<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Municipio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="municipios index large-9 medium-8 columns content">
    <h3><?= __('Municipios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('uf') ?></th>
                <th><?= $this->Paginator->sort('codi_estd') ?></th>
                <th><?= $this->Paginator->sort('desc_estd') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($municipios as $municipio): ?>
            <tr>
                <td><?= $this->Number->format($municipio->id) ?></td>
                <td><?= h($municipio->nome) ?></td>
                <td><?= h($municipio->uf) ?></td>
                <td><?= $this->Number->format($municipio->codi_estd) ?></td>
                <td><?= h($municipio->desc_estd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $municipio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $municipio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $municipio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
