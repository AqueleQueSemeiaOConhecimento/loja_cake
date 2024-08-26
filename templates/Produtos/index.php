<?php $this->layout = 'myLayout'; ?>

<?php $this->assign('title', 'Index'); ?>

<?php $this->start('script'); ?>
    <script>
        alert('home');
    </script>
<?php $this->end(); ?>

<?= $this->element('header/header') ?>

<h1 class="text-3xl font-bold text-blue-600 underline">
    Hello world!
</h1>