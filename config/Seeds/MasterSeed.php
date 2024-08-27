<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Master seed.
 */
class MasterSeed extends AbstractSeed
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
        $this->call('ClienteSeed');
        $this->call('ProdutoSeed');
        $this->call('PedidoSeed');
        $this->call('PedidosProdutosSeed');
        $this->call('PedidosClientesSeed');
    }
}
