<div class="content-wrapper">
  <div class="container-fluid">
    <div class="content-header">
      <div class="alert alert-success">
        <i class="fas fa-tachometer-alt mr-1"></i>
        Dashboard
      </div>
    </div>
    <div class="main-content">
      <div class="row">
        <?php foreach($cabang as $cbg) : ?>
          <div class="col-sm-3">
            <table class="table table-bordered">
              <tr>
                <td class="bg-secondary">Cabang</td>
                <td rowspan="2" class="text-center bg-warning"><h1><strong><?= $cbg->nama_cabang ?></strong></h1></td>
              </tr>
              <tr>
                <td><?= $cbg->lokasi_cabang ?></td>
              </tr>
            </table>
          </div>
        <?php endforeach ?>
        <div class="text-center">
          <img src="<?= base_url('assets/mystyle/img/Edumant1.png') ?>" width="300"><br>
        </div>
      </div>
    </div>
  </div>
</div>