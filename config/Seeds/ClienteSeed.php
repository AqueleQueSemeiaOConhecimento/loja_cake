<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Cliente seed.
 */
class ClienteSeed extends AbstractSeed
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
            $data['nome'] = $faker->firstName . ' ' . $faker->lastName;
            $data['senha'] = password_hash('1234', PASSWORD_DEFAULT);

            $table = $this->table('clientes');
            $table->insert($data)->save();
        }
    }
}
