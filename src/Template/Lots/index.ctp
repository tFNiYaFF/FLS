<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot[]|\Cake\Collection\CollectionInterface $lots
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lot'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Choises'), ['controller' => 'Choises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Choise'), ['controller' => 'Choises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lots index large-9 medium-8 columns content">
    <h3><?= __('Lots') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lots as $lot): ?>
            <tr>
                <td><?= h($lot->title) ?></td>
                <td><?= h($lot->description) ?></td>
                <td><?= h($lot->deadline) ?></td>
                <td><?= h($lot->logo) ?></td>
                <td><?= $this->Number->format($lot->id) ?></td>
                <td><?= h($lot->user) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lot->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lot->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
