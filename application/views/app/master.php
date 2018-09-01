<div class="container main">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          JENIS ANGGOTA
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalJA ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Jenis Anggota</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <th class="text-center">Action</th>
                          <?php endif ?>
                        </tr>
                        <?php
  	                			$i = 1;
  	                			foreach($daftarJA as $item):
  	              			?>
                      <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->nama_ja ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('jenis-anggota/edit/'.$item->kode_ja) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('jenis-anggota/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_ja" value="<?= $item->kode_ja ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                      </tr>
                      <?php
                      $i++;
                      endforeach
                       ?>
                  </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          JENIS PERJALANAN
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalJP ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Jenis Perjalanan</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
                          <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarJP as $item):
                        ?>
                      <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->nama_jp ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('jenis-perjalanan/edit/'.$item->kode_jp) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('jenis-perjalanan/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_jp" value="<?= $item->kode_jp ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                      </tr>
                      <?php
                      $i++;
                      endforeach
                       ?>
                  </table>

        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          JENIS KEGIATAN
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalJK ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Jenis Kegiatan</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
                          <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarJK as $item):
                        ?>
                      <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->nama_jk ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('jenis-kegiatan/edit/'.$item->kode_jk) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('jenis-kegiatan/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_jk" value="<?= $item->kode_jk ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                      </tr>
                      <?php
                      $i++;
                      endforeach
                       ?>
                  </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          DATA ANGGOTA & STAF
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalDA ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Jenis Anggota</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">TMT</th>
                          <th class="text-center">Status Aktif</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
                          <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarDA as $item):
                        ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->nama_ja ?></td>
                          <td><?= $item->nama_da ?></td>
                          <td><?= $item->tmt ?></td>
                          <td>
                            <?php if($item->status_aktif === 'tidak_aktif'): ?>
                              Tidak Aktif
                            <?php else: ?>
                              Aktif
                            <?php endif ?>
                          </td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('data-anggota/edit/'.$item->kode_da) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('data-anggota/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_da" value="<?= $item->kode_da ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                        </tr>
                        <?php
                        $i++;
                        endforeach
                         ?>
                  </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          DATA USER
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalDU ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Hak Akses</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <th class="text-center">Action</th>
                        <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarDU as $item):
                        ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->username ?></td>
                          <td><?= $item->hak_akses ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('data-user/edit/'.$item->kode_du) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('data-user/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_du" value="<?= $item->kode_du ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                        </tr>
                        <?php
                        $i++;
                        endforeach
                         ?>
                  </table>

        </div>
      </div>
    </div>
  </div><!--/.row-->

</div>	<!--/.main-->
