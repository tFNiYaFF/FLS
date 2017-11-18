<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot[]|\Cake\Collection\CollectionInterface $lots
 */
?>

<div class="lots index large-9 medium-8 columns content">
    <h3><?= __('Лоты') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Название') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Описание') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Окончание') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Создатель') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lots as $lot): ?>
            <tr>
                <td><?= h($lot->title) ?></td>
                <td><?= h($lot->description) ?></td>
                <td><?= h($lot->deadline) ?></td>
                <td><?= h($lot->user) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Просмотреть'), ['action' => 'view', $lot->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Первая')) ?>
            <?= $this->Paginator->prev('< ' . __('Предыдущая')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Следующая') . ' >') ?>
            <?= $this->Paginator->last(__('Последняя') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
