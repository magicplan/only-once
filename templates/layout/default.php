<?php
    $this->assign('title', 'Only Once');
?>
<!DOCTYPE html>
<html class="h-full">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('styles') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="bg-white dark:bg-black h-full w-full">
    <?= $this->fetch('content') ?>

    <?= $this->Html->script('scripts') ?>
    <?= $this->fetch('script') ?>
</body>
</html>
