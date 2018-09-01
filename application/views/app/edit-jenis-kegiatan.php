	<div class="container main">

        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Jenis Kegiatan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open('jenis-kegiatan/patch', ['class' => 'form-horizontal']) ?>
		 <?= validation_errors() ?>
		 <?= form_hidden('kode_jk', $JK->kode_jk) ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Kegiatan</label>
									<div class="col-md-9">
                                        <input type="text" name="nama_jk" value="<?= $JK->nama_jk ?>" class="form-control">
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                                        <button type="submit" class="btn btn-default btn-md pull-right">Edit</button>
									</div>
								</div>
            </form>

					</div>
				</div>
			</div>
		</div>

	</div>	<!--/.main-->
