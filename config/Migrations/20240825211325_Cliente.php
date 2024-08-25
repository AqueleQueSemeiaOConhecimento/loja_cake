<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Cliente extends AbstractMigration
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
        $table = $this->table("clientes");
        $table->addColumn("nome", "string", [
            'limit' => 120,
            'null' => false
        ]);
        $table->addColumn("senha", "string", [
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('online', 'boolean', [
            'default' => false,
        ]);
        $table->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('updated_at','timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'update' => 'CURRENT_TIMESTAMP',
            'null' => false
        ]);

        $table->create();
    }
}
