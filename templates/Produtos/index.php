<?php $this->layout = 'myLayout'; ?>

<?php $this->assign('title', 'Index'); ?>

<?php $this->start('script'); ?>
    <script>
        alert('home');
    </script>
<?php $this->end(); ?>

<?= $this->element('header/header') ?>

<h1 class="sm:text-4xl lg:text-6xl px-4 py-7 font-bold text-center text-white md:underline">
    Produtos disponiveis no momento:
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-6 gap-6">
    <?php foreach($produtoDisponivel as $produto): ?>
    <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200">
        <h3 class="text-2xl font-semibold text-gray-800 mb-2"><?= $produto->nome ?></h3>
        <p class="text-lg text-gray-600 mb-2">Custo: R$<?= number_format($produto->valor, 2, ',', '.') ?></p>
        <p class="text-sm text-gray-500 mb-4">Disponíveis no momento: <?= $produto->quantidade ?></p>
        <button id="<?= $produto->id ?>" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out">
            Adicionar ao Carrinho
        </button>
    </div>
    <?php endforeach; ?>
</div>
<br>
<br>


