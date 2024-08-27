<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Pedido seed.
 */
class PedidoSeed extends AbstractSeed
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
        $data = [];
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $table = $this->table('pedidos');
            $table->insert($data)->save();
        }
    }
}
