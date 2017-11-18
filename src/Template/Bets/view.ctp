<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bet $bet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bet'), ['action' => 'edit', $bet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bet'), ['action' => 'delete', $bet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lots'), ['controller' => 'Lots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lot'), ['controller' => 'Lots', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bets view large-9 medium-8 columns content">
    <h3><?= h($bet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lot') ?></th>
            <td><?= $bet->has('lot') ? $this->Html->link($bet->lot->title, ['controller' => 'Lots', 'action' => 'view', $bet->lot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fio') ?></th>
            <td><?= h($bet->fio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sum') ?></th>
            <td><?= $this->Number->format($bet->sum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Choise') ?></th>
            <td><?= $this->Number->format($bet->choise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Betdate') ?></th>
            <td><?= h($bet->betdate) ?></td>
        </tr>
    </table>
</div>
