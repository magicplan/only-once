<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Secret Entity
 *
 * @property string $id
 * @property string $key
 * @property string $data
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Secret extends Entity
{
    public const MAX_AGE = '14 days ago';

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string,bool>
     */
    protected $_accessible = [
        '*' => false,
    ];
}
