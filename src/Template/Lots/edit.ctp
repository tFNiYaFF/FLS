<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot $lot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bets'), ['controller' => 'Bets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bet'), ['controller' => 'Bets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Choises'), ['controller' => 'Choises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Choise'), ['controller' => 'Choises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lots form large-9 medium-8 columns content">
    <?= $this->Form->create($lot) ?>
    <fieldset>
        <legend><?= __('Edit Lot') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('deadline', ['empty' => true]);
            echo $this->Form->control('logo');
            echo $this->Form->control('user');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
