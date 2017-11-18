<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bet[]|\Cake\Collection\CollectionInterface $bets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lots'), ['controller' => 'Lots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lot'), ['controller' => 'Lots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bets index large-9 medium-8 columns content">
    <h3><?= __('Bets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lot_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('choise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('betdate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bets as $bet): ?>
            <tr>
                <td><?= $this->Number->format($bet->id) ?></td>
                <td><?= $bet->has('lot') ? $this->Html->link($bet->lot->title, ['controller' => 'Lots', 'action' => 'view', $bet->lot->id]) : '' ?></td>
                <td><?= h($bet->fio) ?></td>
                <td><?= $this->Number->format($bet->sum) ?></td>
                <td><?= $this->Number->format($bet->choise) ?></td>
                <td><?= h($bet->betdate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bet->id)]) ?>
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
