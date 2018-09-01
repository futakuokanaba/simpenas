
	<div class="container main">

        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Jenis Anggota
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open('jenis-anggota/patch', ['class' => 'form-horizontal']) ?>
		 <?= validation_errors() ?>
		 <?= form_hidden('kode_ja', $JA->kode_ja) ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Anggota</label>
									<div class="col-md-9">
                                        <input type="text" name="nama_ja" value="<?= $JA->nama_ja ?>" class="form-control">
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
