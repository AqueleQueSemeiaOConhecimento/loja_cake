<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Produto seed.
 */
class ProdutoSeed extends AbstractSeed
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
            $data['nome'] = $faker->unique()->words(3, true);
            $data['cod'] = $faker->unique()->bothify('####');
            $data['quantidade'] = $faker->numberBetween(7, 99);
            $data['valor'] = $faker->numberBetween(200, 4200);

            $table = $this->table('produtos');
            $table->insert($data)->save();
        }
    }
}
