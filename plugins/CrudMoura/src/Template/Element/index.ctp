<?php
    echo $this->Html->css('CrudMoura.listar',['inline'=>false]);
    echo $this->Html->script('CrudMoura.listar',['inline'=>false]);

?>
<div class="div-lista">
    <div class="lista-titul">
        <h1><?php echo $tituloLista ?></h1>
    </div>

    <div class="lista-ferramentas">
        ferramentas
    </div>

    <div class="lista-filtros">
        filtros
    </div>

    <div class="lista-linhas">
      <table class='table'>
        <thead>
        <tr>
        <?php
          foreach($this->request->listFields as $_l => $_cmp) {
            $a = explode('.',$_cmp);
            $e = isset($this->request->esquemas[$a[0]][$a[1]])
              ? $this->request->esquemas[$a[0]][$a[1]]
              : null;
            $t = isset($e['titulo']) ? $e['titulo'] : $a[1];
            $th = 'th'.$a[0].ucfirst($a[1]);

            echo "<th id='$th' class='th'>$t</th>";
          }
        ?>
      </tr>
      <thead>

      <?php if (!empty($this->request->data)) : ?>
      <tbody>
        <?php foreach($this->request->data as $_l => $_objMod) : ?>
          <tr>
          <?php
            foreach($this->request->listFields as $_l2 => $_cmp) {
              $a = explode('.',$_cmp);
              $m = strtolower($a[0]);
              $c = $a[1];
              $e = isset($this->request->esquemas[$a[0]][$a[1]])
                ? $this->request->esquemas[$a[0]][$a[1]]
                : null;
              $v = isset($_objMod->$m->$c)
                ? $_objMod->$m->$c
                : null;
              if (!isset($v)) {
                $v = isset($_objMod->$c) ? $_objMod->$c : '--';
              }

              echo "<td id='' class=''>$v</td>";
            };
          ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <?php endif ?>
      </table>
    </div>

</div>
<?php
  /*debug($this->request->listFields);
  debug($this->request->data);*/
?>
