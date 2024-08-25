<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class PedidosProdutos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table("pedidos_produtos");
        $table->addColumn("pedido_id","integer", [
            'signed' => true,
            'null' => false
        ]);
        $table->addColumn("produto_id","integer", [
            'signed' => true,
            'null' => false
        ]);
        $table->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false
        ]);
        $table->addColumn('updated_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'update' => 'CURRENT_TIMESTAMP',
            'null' => false
        ]);

        $table->addForeignKey('pedido_id', 'pedidos', 'id');
        $table->addForeignKey('produto_id', 'produtos', 'id');

        $table->create();
    }
}
