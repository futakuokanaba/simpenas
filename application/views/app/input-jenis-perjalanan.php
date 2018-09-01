<div class="container main">
      <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Input Jenis Perjalanan
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">

          <?= form_open('jenis-perjalanan/post', ['class' => 'form-horizontal']) ?>
<?= validation_errors() ?>

              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Jenis Perjalanan</label>
                <div class="col-md-9">
                                      <input type="text" name="nama_jp" value="<?= $input->nama_jp ?>" class="form-control">
                </div>
              </div>

              <!-- Form actions -->
              <div class="form-group">
                <div class="col-md-12 widget-right">
                                      <button type="submit" class="btn btn-default btn-md pull-right">Tambah</button>
                </div>
              </div>
          <?= form_close() ?>

        </div>
      </div>
    </div>
  </div>

</div>	<!--/.main-->
