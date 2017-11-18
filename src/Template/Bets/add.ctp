<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bet $bet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lots'), ['controller' => 'Lots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lot'), ['controller' => 'Lots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bets form large-9 medium-8 columns content">
    <?= $this->Form->create($bet) ?>
    <fieldset>
        <legend><?= __('Add Bet') ?></legend>
        <?php
            echo $this->Form->control('lot_id', ['options' => $lots, 'empty' => true]);
            echo $this->Form->control('fio');
            echo $this->Form->control('sum');
            echo $this->Form->control('choise');
            echo $this->Form->control('betdate', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
