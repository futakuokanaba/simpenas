
	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Detail Panjar
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
            <dl class="dl-horizontal">
              <dt>No. Surat Tugas</dt>
              <dd><strong><?= $panjar->no_surat_tugas ?></strong></dd>
							<br>
							<dt>Jenis Perjalanan</dt>
              <dd><strong><?= $panjar->nama_jp ?></strong></dd>
							<br>
							<dt>Nama Kegiatan</dt>
              <dd><strong><?= $panjar->nama_jk ?></strong></dd>
							<br>
							<dt>Daerah Tujuan</dt>
              <dd><strong><?= $panjar->daerah_tujuan ?></strong></dd>
							<br>
              <dt>Waktu Berangkat</dt>
              <dd><strong><?= $panjar->waktu_berangkat ?></strong></dd>
							<br>
              <dt>Waktu Kembali</dt>
              <dd><strong><?= $panjar->waktu_kembali ?></strong></dd>
							<br>
              <dt>Diberikan Kepada</dt>
              <dd><strong><?= $panjar->nama_da ?></strong></dd>
							<br>
             <dt>Waktu Pembayaran</dt>
              <dd><strong><?= $panjar->waktu_pembayaran ?></strong></dd>
              <br>
              <dt>No. Bukti</dt>
              <dd><strong><?= $panjar->no_bukti ?></strong></dd>
              <br>
              <dt>Jumlah Panjar (Rp.)</dt>
              <dd><strong><?= number_format($panjar->jumlah_panjar, 0, ',', '.') ?></strong></dd>
              <br>
              <dt>Action</dt>
              <dd>
								<a href='<?= base_url('panjar/edit/'.$panjar->kode_panjar) ?>' class="btn btn-info">EDIT</a>
								<form action="<?= base_url('panjar/delete') ?>" method="post" style="display: inline-block">
											<input type="hidden" name="kode_panjar" value="<?= $panjar->kode_panjar ?>">
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
