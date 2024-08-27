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

        // Assumindo que você tem 20 pedidos e 50 produtos
        $numPedidos = 20;
        $numProdutos = 50;

        for ($i = 0; $i < 100; $i++) { // Adicionando 100 associações fictícias
            $data[] = [
                'pedido_id'  => $faker->numberBetween(1, $numPedidos),
                'produto_id' => $faker->numberBetween(1, $numProdutos)
            ];
        }

        $table = $this->table('pedidos_produtos');
        $table->insert($data)->save();
    }
}
