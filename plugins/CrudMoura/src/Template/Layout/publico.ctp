<?php
/**
 * Scrun : http://www.scrun.com.br/
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Scrun
 * @link          http://www.scrun.com.br/
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$tituloPagina = isset($tituloPagina) ? $tituloPagina : 'Scrun';
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

    <?= $this->Html->script('CrudMoura/jquery-2.2.0.min.js') ?>
    <?= $this->Html->script('CrudMoura/publico.js') ?>
    <?= $this->Html->script('CrudMoura/geral.js') ?>

    <?= $this->Html->css('CrudMoura/reset.css') ?>
    <?= $this->Html->css('CrudMoura/bootstrap.min.css') ?>
    <?= $this->Html->css('CrudMoura/publico.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">
        var site     = '<?= $this->request->site; ?>';
        var cadastro = '<?= $this->request->cadastro; ?>';
    </script>

</head>

<body>
    <?= $this->Flash->render() ?>

    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>

</body>
</html>
