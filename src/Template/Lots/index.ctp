<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot[]|\Cake\Collection\CollectionInterface $lots
 */
?>
<div style="width: 100%; display: flex; justify-content: center;">
    <div class="lots index large-9 medium-8 columns content" style="text-align: center;">
        <h3><?= __('Lots') ?></h3>
        <table cellpadding="0" cellspacing="0" >
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Action') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($lots as $lot): ?>
                <tr>
                    <td><?= h($lot->title) ?></td>
                    <td><?= h($lot->description) ?></td>
                    <td><?= h($lot->deadline) ?></td>
                    <td><?= h($lot->user) ?></td>
                    <?php if($lot->active==1):?>
                        <td style="color:green"><?= h("Active") ?></td>
                    <?php else:?>
                        <td style="color:red"><?= h("Closed") ?></td>
                    <?php endif;?>
                    <td class="actions">
                        <?= $this->Html->link(__('More'), ['action' => 'view', $lot->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('First')) ?>
                <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Next') . ' >') ?>
                <?= $this->Paginator->last(__('Last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>

</div>
