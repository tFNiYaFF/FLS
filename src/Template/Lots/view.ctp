<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lot $lot
 */
?>
<div style="width: 100%; display: flex; justify-content: center;">
<div class="lots view large-9 medium-8 columns content" style="text-align: center;">
    <h3><?= h($lot->title) ?></h3>
    <table class="vertical-table" >
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($lot->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($lot->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($lot->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($lot->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <?php if($lot->active==1):?>
                <td style="color:green"><?= h("Active") ?></td>
            <?php else:?>
                <td style="color:red"><?= h("Closed") ?></td>
            <?php endif;?>
        </tr>
    </table>
    <br>
    <br>
    <div class="related">
        <h4><?= __('Choices') ?></h4>
        <?php if (!empty($lot->choises)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Ratio') ?></th>
                </tr>
                <?php
                    $koeff = array();
                    $dbKeysToListKeys = array();
                    $counter = 1;
                    foreach ($lot->choises as $choises): ?>
                    <tr>
                        <td><?= h($counter) ?></td>
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
                            $dbKeysToListKeys[$choises->id] = $counter++;
                        ?>
                        <td><?= h(round($currentK,3)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <br>
    <br>
    <div class="related">
        <?php if (!empty($lot->bets)): ?>
        <h4><?= __('Current participants') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Sum') ?></th>
                <th scope="col"><?= __('Choice') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <?php if($lot->active==0):?><th scope="col"><?= __('Prize') ?></th><?php endif;?>
            </tr>
            <?php foreach ($lot->bets as $bets): ?>
            <tr>
                <td><?= h($bets->fio) ?></td>
                <td><?= $this->Number->currency($bets->sum,"USD") ?></td>
                <td><?= h($dbKeysToListKeys[$bets->choise]) ?></td>
                <td><?= h($bets->betdate) ?></td>
                <?php if($lot->active==0)
                    if($lot->winner==$bets->choise):?>
                        <td style="color:green;"><b><?= $this->Number->currency( round(($bets->sum)*$koeff[$bets->choise],3), "RUB") ?></b></td>
                    <?php else:?>
                        <td style="color:red;"><b><?= $this->Number->currency(0,"USD")  ?></b></td>
                <?php endif;?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php if($lot->active == 1):?>
        <br>
        <br>
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
    <?php endif;?>
</div>
