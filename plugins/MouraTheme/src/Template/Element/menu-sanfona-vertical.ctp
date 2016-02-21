<?php
  $titMenu = md5(serialize($menu));
  $url     = $this->request->url;
?>
<div class="menu-sanfona-vertical" id="<?= $titMenu ?>">
  <?php $l=0; foreach($menu as $_tituloMenu => $_arrL) : $l++ ?>
    <div class="menu-titulo"><?= $_tituloMenu ?></div>
    <div id="menu<?= $l ?>" class="menu-itens
      ">
    <?php foreach($_arrL as $_l => $_arrOpcs) : ?>
        <a class="menu-link" href="<?= $_arrOpcs['base'].$_arrOpcs['link'] ?>"><?= $_arrOpcs['label'] ?></a>
    <?php endforeach ?>
    </div>
  <?php endforeach ?>

</div>
