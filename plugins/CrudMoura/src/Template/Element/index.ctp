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

            echo "<th id='$th' class='th'>";
            if (isset($e['sort'])) {
              echo $this->Paginator->sort($a[0].'.'.$a[1],$t);
            } else {
              echo "$t";
            }
            echo "</th>";
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
              $a = explode('.',$_cmp);  // entidade.cmp
              $m = strtolower($a[0]);   // entidade
              $c = $a[1];               // cmp
              $e = isset($this->request->esquemas[$a[0]][$a[1]]) ? $this->request->esquemas[$a[0]][$a[1]] : null;
              $v = isset($_objMod->$m->$c) ? $_objMod->$m->$c : null;
              $v = !isset($v) ? isset($_objMod->$c) ? $_objMod->$c : '--' : $v;
              $v = (isset($e['options']) && isset($e['options'][$v]))
                ? $e['options'][$v]
                : $v;

              echo "<td id='' class=''>$v</td>";
            };
          ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <?php endif ?>
      </table>
    </div><!-- fim table -->

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('<')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('>') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>

</div>
<?php
  debug($this->request->esquemas);
  //debug($this->request->listFields);
  //debug($this->request->data);
?>
