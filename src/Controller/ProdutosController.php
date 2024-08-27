<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController
{
    public function index()
    {
        $TableProduto = TableRegistry::getTableLocator()->get('Produtos');
        $produtoDisponivel = $TableProduto->find('all', ['order' => 'valor asc']);

        $this->set(compact('produtoDisponivel'));
    }
}
