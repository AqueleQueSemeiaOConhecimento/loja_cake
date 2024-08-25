<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdutosFixture
 */
class ProdutosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cod' => 'Lorem ipsum dolor sit amet',
                'quantidade' => 1,
                'created_at' => 1724623149,
                'updated_at' => 1724623149,
            ],
        ];
        parent::init();
    }
}
