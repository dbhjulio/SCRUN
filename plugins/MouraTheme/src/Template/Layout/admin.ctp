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
    <?= $this->Html->script('/MouraTheme/js/bootstrap.min.js'); ?>
    <?= $this->Html->script('/MouraTheme/js/admin.js') ?>
    <?= $this->Html->script('/MouraTheme/js/geral.js') ?>
    <?= $this->Html->script('/MouraTheme/js/admin.js') ?>

    <?= $this->Html->css('/MouraTheme/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/MouraTheme/css/reset.css') ?>
    <?= $this->Html->css('/MouraTheme/css/admin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>
<div class="corpo">
    <div class="row-fluid cabecalho">
      <div class="col-xs-24 col-md-2">
          <a href="<?php echo $this->request->site ?>">Cabecalho 1</a>
      </div>
      <div class="col-xs-24 col-md-10">Cabecalho 2 - layout MouraTheme.Admin</div>
    </div>

    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row-fluid pagina">
      <div id='barra-esquerda' class="col-xs-12 col-md-2">
          <?php echo $this->element('MouraTheme.menu-sanfona-vertical',['menu'=>$menuEsquerdo]); ?>
      </div>
      <div id='conteudo' class="col-xs-12 col-md-10">
          <?= $this->fetch('content') ?>

      </div>
    </div>

</div><!-- fim corpo -->

</body>
</html><!-- fim layout MouraTheme.admin -->
