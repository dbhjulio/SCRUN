<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Perfi'), ['action' => 'edit', $perfi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Perfi'), ['action' => 'delete', $perfi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Urls'), ['controller' => 'Urls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Url'), ['controller' => 'Urls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="perfis view large-9 medium-8 columns content">
    <h3><?= h($perfi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($perfi->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($perfi->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Urls') ?></h4>
        <?php if (!empty($perfi->urls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Rota') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Titulo Menu') ?></th>
                <th><?= __('Icone') ?></th>
                <th><?= __('So Icone') ?></th>
                <th><?= __('Posicao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($perfi->urls as $urls): ?>
            <tr>
                <td><?= h($urls->id) ?></td>
                <td><?= h($urls->rota) ?></td>
                <td><?= h($urls->status) ?></td>
                <td><?= h($urls->menu_id) ?></td>
                <td><?= h($urls->titulo_menu) ?></td>
                <td><?= h($urls->icone) ?></td>
                <td><?= h($urls->so_icone) ?></td>
                <td><?= h($urls->posicao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Urls', 'action' => 'view', $urls->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Urls', 'action' => 'edit', $urls->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Urls', 'action' => 'delete', $urls->id], ['confirm' => __('Are you sure you want to delete # {0}?', $urls->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($perfi->usuarios)): ?>
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
            <?php foreach ($perfi->usuarios as $usuarios): ?>
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
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($perfi->us)): ?>
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
            <?php foreach ($perfi->us as $us): ?>
            <tr>
                <td><?= h($us->id) ?></td>
                <td><?= h($us->nome) ?></td>
                <td><?= h($us->email) ?></td>
                <td><?= h($us->municipio_id) ?></td>
                <td><?= h($us->senha) ?></td>
                <td><?= h($us->status) ?></td>
                <td><?= h($us->criado) ?></td>
                <td><?= h($us->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $us->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $us->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $us->id], ['confirm' => __('Are you sure you want to delete # {0}?', $us->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
