<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bet Entity
 *
 * @property int $id
 * @property int $lot_id
 * @property string $fio
 * @property int $sum
 * @property int $choise
 * @property \Cake\I18n\FrozenTime $betdate
 *
 * @property \App\Model\Entity\Lot $lot
 */
class Bet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'lot_id' => true,
        'fio' => true,
        'sum' => true,
        'choise' => true,
        'betdate' => true,
        'lot' => true
    ];
}
