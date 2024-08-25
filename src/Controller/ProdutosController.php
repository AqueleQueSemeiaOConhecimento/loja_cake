<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController
{
    public function index()
    {
        $name = 'sabrina';

        $this->set(compact('name'));
    }
}
