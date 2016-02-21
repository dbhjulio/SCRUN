<?php
//    echo "<pre>".print_r($menu,true)."</pre>";
  $titMenu = md5(serialize($menu));
?>

<div class="panel" id="<?= $titMenu ?>">
  <div class="panel panel-default">
  <?php $l=0; foreach($menu as $_tituloMenu => $_arrL) : $l++ ?>
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#<?= $titMenu ?>"
            href="#menu<?= $l ?>"><?= $_tituloMenu ?></a>
        </h4>
    </div>
    <?php foreach($_arrL as $_l => $_arrOpcs) : ?>
      <div id="menu<?= $l ?>" class="panel-collapse collapse">
          <a class="list-group-item" href="<?= $_arrOpcs['link'] ?>">
            <?= $_arrOpcs['label'] ?>
          </a>
      </div>
    <?php endforeach ?>
  <?php endforeach ?>
  </div>

</div>
