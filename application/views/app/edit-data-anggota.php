	<div class="container main">

        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Data Anggota
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open('data-anggota/patch', ['class' => 'form-horizontal']) ?>
		 <?= validation_errors() ?>
		 <?= form_hidden('kode_da', $DA->kode_da) ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Anggota</label>
									<div class="col-md-9">
                                        <?= form_dropdown('kode_ja', getDropDownList('jenis_anggota', ['kode_ja', 'nama_ja']), $DA->kode_ja, ['class' => 'form-control']) ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Anggota</label>
									<div class="col-md-9">
                                        <input type="text" name="nama_da" value="<?= $DA->nama_da ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">TMT</label>
									<div class="col-md-9">
                                        <input type="date" name="tmt" value="<?= $DA->tmt ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Status Aktif</label>
									<div class="col-md-9">
									    <?= form_dropdown('status_aktif', ['aktif' => 'Aktif', 'tidak_aktif' => 'Tidak Aktif'], $DA->status_aktif, ['class' => 'form-control']) ?>
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
