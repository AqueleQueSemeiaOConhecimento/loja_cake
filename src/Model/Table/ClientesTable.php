<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\HasMany $Pedidos
 *
 * @method \App\Model\Entity\Cliente newEmptyEntity()
 * @method \App\Model\Entity\Cliente newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cliente> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cliente findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cliente> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cliente saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cliente>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cliente> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cliente>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cliente> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Pedidos', [
            'foreignKey' => 'cliente_id',
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
            ->maxLength('nome', 120)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 255)
            ->requirePresence('senha', 'create')
            ->notEmptyString('senha');

        $validator
            ->boolean('online')
            ->notEmptyString('online');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }
}
