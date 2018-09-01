
	<div class="container main">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Input Data Kegiatan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

            <?= form_open('kegiatan/post', ['class' => 'form-horizontal']) ?>
            <?= validation_errors() ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">No. Surat Tugas</label>
									<div class="col-md-9">
                                        <input type="text" name="no_surat_tugas" value="<?= $input->no_surat_tugas ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Perjalanan</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_jp', getDropDownList('jenis_perjalanan', ['kode_jp', 'nama_jp']), $input->kode_jp, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Kegiatan</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_jk', getDropDownList('jenis_kegiatan', ['kode_jk', 'nama_jk']), $input->kode_jk, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Daerah Tujuan</label>
									<div class="col-md-9">
                                        <input type="text" class="form-control" name="daerah_tujuan" value="<?= $input->daerah_tujuan ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Berangkat</label>
									<div class="col-md-9">
                                        <input type="date" class="form-control" name="waktu_berangkat" value="<?= $input->waktu_berangkat ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Kembali</label>
									<div class="col-md-9">
                                        <input type="date" class="form-control" name="waktu_kembali" value="<?= $input->waktu_kembali ?>">
									</div>
								</div>
								<div class="form-group">
								    <p class="col-md-offset-1"> <strong>Ditugaskan Kepada :</strong> </p>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_da', getDropDownList('data_anggota', ['kode_da', 'nama_da']), $input->kode_da, ['class' => 'form-control']) ?>
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
