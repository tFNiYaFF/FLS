<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lot Entity
 *
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $deadline
 * @property string $logo
 * @property int $id
 * @property string $user
 *
 * @property \App\Model\Entity\Bet[] $bets
 * @property \App\Model\Entity\Choise[] $choises
 */
class Lot extends Entity
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
        'title' => true,
        'description' => true,
        'deadline' => true,
        'logo' => true,
        'user' => true,
        'bets' => true,
        'choises' => true
    ];
}
