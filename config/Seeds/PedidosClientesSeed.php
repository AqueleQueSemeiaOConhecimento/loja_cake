<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * PedidosClientes seed.
 */
class PedidosClientesSeed extends AbstractSeed
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

        $numPedidos = 20;
        $numClientes = 100;

        for ($i = 0; $i < $numPedidos; $i++) {
            $data[] = [
                'pedido_id'  => $faker->numberBetween(1, $numPedidos),
                'cliente_id' => $faker->numberBetween(1, $numClientes),
            ];
        }

        $table = $this->table('pedidos_clientes');
        $table->insert($data)->save();
    }
}
