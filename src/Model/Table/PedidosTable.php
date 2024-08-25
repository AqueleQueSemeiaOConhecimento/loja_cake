<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsToMany $Produtos
 *
 * @method \App\Model\Entity\Pedido newEmptyEntity()
 * @method \App\Model\Entity\Pedido newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pedido> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pedido findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pedido> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pedido saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PedidosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pedidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Produtos', [
            'foreignKey' => 'pedido_id',
            'targetForeignKey' => 'produto_id',
            'joinTable' => 'pedidos_produtos',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('produto_id')
            ->notEmptyString('produto_id');

        $validator
            ->nonNegativeInteger('cliente_id')
            ->notEmptyString('cliente_id');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'), ['errorField' => 'produto_id']);
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'), ['errorField' => 'cliente_id']);

        return $rules;
    }
}
