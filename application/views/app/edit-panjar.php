
	<div class="container main">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Data Panjar
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open('panjar/patch', ['class' => 'form-horizontal']) ?>
		 <?= validation_errors() ?>
		 <?= form_hidden('kode_panjar', $panjar->kode_panjar) ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">No. Surat Tugas</label>
									<div class="col-md-9">
                                        <input type="text" name="no_surat_tugas" value="<?= $panjar->no_surat_tugas ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Perjalanan</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_jp', getDropDownList('jenis_perjalanan', ['kode_jp', 'nama_jp']), $panjar->kode_jp, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Kegiatan</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_jk', getDropDownList('jenis_kegiatan', ['kode_jk', 'nama_jk']), $panjar->kode_jk, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Daerah Tujuan</label>
									<div class="col-md-9">
                                        <input type="text" class="form-control" value="<?= $panjar->daerah_tujuan ?>" name="daerah_tujuan">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Berangkat</label>
									<div class="col-md-9">
                                        <input type="date" class="form-control" name="waktu_berangkat" value="<?= $panjar->waktu_berangkat ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Kembali</label>
									<div class="col-md-9">
                                        <input type="date" class="form-control" value="<?= $panjar->waktu_kembali ?>" name="waktu_kembali">
									</div>
								</div>
								<div class="form-group">
								    <p class="col-md-offset-1"> <strong>Diberikan Panjar Kepada :</strong> </p>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_da', getDropDownList('data_anggota', ['kode_da', 'nama_da']), $panjar->kode_da, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Pembayaran</label>
									<div class="col-md-9">
                                        <input type="date" class="form-control" value="<?= $panjar->waktu_pembayaran ?>" name="waktu_pembayaran">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">No. Bukti</label>
									<div class="col-md-9">
                                        <input type="text" class="form-control" name="no_bukti" value="<?= $panjar->no_bukti ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jumlah Panjar (Rp.) </label>
									<div class="col-md-9">
                                        <input type="text" class="form-control" name="jumlah_panjar" value="<?= $panjar->jumlah_panjar ?>">
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                        <button type="submit" class="btn btn-default btn-md pull-right">Edit</button>
									</div>
								</div>
            <?= form_close() ?>

					</div>
				</div>
			</div>
		</div>

	</div>	<!--/.main-->
