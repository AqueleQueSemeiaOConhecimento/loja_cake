<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo h($this->fetch('title', 'Projeto com CakePHP')) ?></title>
</head>
<body>
    <div class="min-h-full">
        <?= $this->fetch('content') ?>
        <?= $this->element('footer/footer') ?>
    </div>
    <?= $this->fetch('script'); ?>
</body>
</html>