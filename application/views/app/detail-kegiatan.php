
	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Detail Kegiatan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
            <dl class="dl-horizontal">
              <dt>No. Surat Tugas</dt>
              <dd><strong><?= $kegiatan->no_surat_tugas ?></strong></dd>
							<br>
							<dt>Jenis Perjalanan</dt>
              <dd><strong><?= $kegiatan->nama_jp ?></strong></dd>
							<br>
							<dt>Nama Kegiatan</dt>
              <dd><strong><?= $kegiatan->nama_jk ?></strong></dd>
							<br>
							<dt>Daerah Tujuan</dt>
              <dd><strong><?= $kegiatan->daerah_tujuan ?></strong></dd>
							<br>
              <dt>Waktu Berangkat</dt>
              <dd><strong><?= $kegiatan->waktu_berangkat ?></strong></dd>
							<br>
              <dt>Waktu Kembali</dt>
              <dd><strong><?= $kegiatan->waktu_kembali ?></strong></dd>
							<br>
              <dt>Ditugaskan Kepada</dt>
              <dd><strong><?= $kegiatan->nama_da ?></strong></dd>
							<br>
              <dt>Action</dt>
              <dd>
								<a href='<?= base_url('kegiatan/edit/'.$kegiatan->kode_kegiatan) ?>' class="btn btn-info">EDIT</a>
								<form action="<?= base_url('kegiatan/delete') ?>" method="post" style="display: inline-block">
											<input type="hidden" name="kode_kegiatan" value="<?= $kegiatan->kode_kegiatan ?>">
											<button type="submit" class="btn btn-danger">
													HAPUS
											</button>
								</form>
              </dd>
            </dl>
					</div>
				</div>

			</div><!--/.col-->
		</div><!--/.row-->

	</div>	<!--/.main-->
