<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\HasMany $Pedidos
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\BelongsToMany $Pedidos
 *
 * @method \App\Model\Entity\Produto newEmptyEntity()
 * @method \App\Model\Entity\Produto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Produto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Produto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Produto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Produto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Produto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProdutosTable extends Table
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

        $this->setTable('produtos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Pedidos', [
            'foreignKey' => 'produto_id',
        ]);
        $this->belongsToMany('Pedidos', [
            'foreignKey' => 'produto_id',
            'targetForeignKey' => 'pedido_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cod')
            ->maxLength('cod', 255)
            ->requirePresence('cod', 'create')
            ->notEmptyString('cod');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }
}
