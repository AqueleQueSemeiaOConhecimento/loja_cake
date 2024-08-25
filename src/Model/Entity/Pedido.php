<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $produto_id
 * @property int $cliente_id
 * @property \Cake\I18n\DateTime $created_at
 *
 * @property \App\Model\Entity\Produto[] $produtos
 * @property \App\Model\Entity\Cliente $cliente
 */
class Pedido extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'produto_id' => true,
        'cliente_id' => true,
        'created_at' => true,
        'produtos' => true,
        'cliente' => true,
    ];
}
