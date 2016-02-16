<?php
/**
 * MouraTheme
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$tituloPagina = isset($tituloPagina) ? $tituloPagina : 'MouraThema';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $tituloPagina ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('/MouraTheme/js/jquery-2.2.0.min.js') ?>
    <?= $this->Html->script('/MouraTheme/js/default.js') ?>
    <?= $this->Html->script('/MouraTheme/js/geral.js') ?>

    <?= $this->Html->css('/MouraTheme/css/reset.css') ?>
    <?= $this->Html->css('/MouraTheme/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/MouraTheme/css/publico.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>
    <?= $this->Flash->render() ?>

    <section class="container clearfix">
        <?= $this->fetch('content') ?>

    </section>

</body>
</html><!-- fim layout do tema MouraTheme -->
