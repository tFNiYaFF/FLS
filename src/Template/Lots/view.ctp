<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot $lot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar" >
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Список ставок'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="lots view large-9 medium-8 columns content">
    <h3><?= h($lot->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Название') ?></th>
            <td><?= h($lot->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Описание') ?></th>
            <td><?= h($lot->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Создатель') ?></th>
            <td><?= h($lot->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Окончание') ?></th>
            <td><?= h($lot->deadline) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Варианты') ?></h4>
        <?php if (!empty($lot->choises)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Lot Id') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Коэффициент') ?></th>
                </tr>
                <?php
                    $koeff = array();
                    foreach ($lot->choises as $choises): ?>
                    <tr>
                        <td><?= h($choises->id) ?></td>
                        <td><?= h($choises->lot_id) ?></td>
                        <td><?= h($choises->description) ?></td>
                        <?php
                            $sum = 0;
                            $currentSum = 0;
                            $currentK = 0;
                            foreach ($lot->bets as $bets){
                                $sum+=$bets->sum;
                                if($choises->id == $bets->choise){
                                    $currentSum+=$bets->sum;
                                }
                            }
                            if($currentSum==0){
                                $currentSum = 1;
                            }
                            if($sum != 0){
                                $currentK = $sum/$currentSum;
                                $koeff[$choises->id] = $currentK;
                            }
                        ?>
                        <td><?= h(round($currentK,3)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Текущие ставки') ?></h4>
        <?php if (!empty($lot->bets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Поставил') ?></th>
                <th scope="col"><?= __('Сумма') ?></th>
                <th scope="col"><?= __('Выбор') ?></th>
                <th scope="col"><?= __('Дата ставки') ?></th>
                <?php if($lot->active==0):?><th scope="col"><?= __('Выплата') ?></th><?php endif;?>
            </tr>
            <?php foreach ($lot->bets as $bets): ?>
            <tr>
                <td><?= h($bets->fio) ?></td>
                <td><?= h($bets->sum) ?></td>
                <td><?= h($bets->choise) ?></td>
                <td><?= h($bets->betdate) ?></td>
                <?php if($lot->active==0)
                    if($lot->winner==$bets->choise):?>
                        <td style="color:green;"><b><?= h(round(($bets->sum)*$koeff[$bets->choise],3)) ?></b></td>
                    <?php else:?>
                        <td style="color:red;"><b><?= h(0) ?></b></td>
                <?php endif;?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php if($lot->active == 1):?>
    <div class="bets form large-9 medium-8 columns content">
        <?= $this->Form->create(null,['method'=>'POST','url'=>'/bets.html']) ?>
        <fieldset>
            <legend><?= __('Add Bet') ?></legend>
            <?php
            $arr = array();
            foreach ($lot->choises as $l){
                $arr[$l->id]=$l->description;
            }
            echo $this->Form->hidden('lot_id', ['value'=>$lot->id]);
            echo $this->Form->control('fio');
            echo $this->Form->control('sum');
            echo $this->Form->select('choise', $arr,['label'=>'']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    <?php endif;?>
</div>
