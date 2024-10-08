<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * PedidosProdutos seed.
 */
class PedidosProdutosSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker\Factory::create();
        $data = [];

        $numPedidos = 210;
        $numProdutos = 20;

        for ($i = 0; $i < 20; $i++) { 
            $data[] = [
                'pedido_id'  => $faker->numberBetween(1, $numPedidos),
                'produto_id' => $faker->numberBetween(1, $numProdutos)
            ];
        }

        $table = $this->table('pedidos_produtos');
        $table->insert($data)->save();
    }
}
