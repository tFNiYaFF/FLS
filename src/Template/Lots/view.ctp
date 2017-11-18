<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot $lot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lot'), ['action' => 'edit', $lot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lot'), ['action' => 'delete', $lot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lot'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Choises'), ['controller' => 'Choises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Choise'), ['controller' => 'Choises', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lots view large-9 medium-8 columns content">
    <h3><?= h($lot->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($lot->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($lot->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($lot->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($lot->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($lot->deadline) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bets') ?></h4>
        <?php if (!empty($lot->bets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lot Id') ?></th>
                <th scope="col"><?= __('Fio') ?></th>
                <th scope="col"><?= __('Sum') ?></th>
                <th scope="col"><?= __('Choise') ?></th>
                <th scope="col"><?= __('Betdate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lot->bets as $bets): ?>
            <tr>
                <td><?= h($bets->id) ?></td>
                <td><?= h($bets->lot_id) ?></td>
                <td><?= h($bets->fio) ?></td>
                <td><?= h($bets->sum) ?></td>
                <td><?= h($bets->choise) ?></td>
                <td><?= h($bets->betdate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bets', 'action' => 'view', $bets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bets', 'action' => 'edit', $bets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bets', 'action' => 'delete', $bets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Choises') ?></h4>
        <?php if (!empty($lot->choises)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lot Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lot->choises as $choises): ?>
            <tr>
                <td><?= h($choises->id) ?></td>
                <td><?= h($choises->lot_id) ?></td>
                <td><?= h($choises->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Choises', 'action' => 'view', $choises->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Choises', 'action' => 'edit', $choises->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Choises', 'action' => 'delete', $choises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $choises->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
