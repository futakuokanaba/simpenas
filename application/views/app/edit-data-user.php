	<div class="container main">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Data User
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open('data-user/patch', ['class' => 'form-horizontal']) ?>
		 <?= validation_errors() ?>
		 <?= form_hidden('kode_du', $DU->kode_du) ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username</label>
									<div class="col-md-9">
                                        <input type="text" name="username" value="<?= $DU->username ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password</label>
									<div class="col-md-9">
                                        <input type="password" name="password" value="<?= $DU->password ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Hak Akses</label>
									<div class="col-md-9">
																				<?= form_dropdown('hak_akses', ['operator' => 'Operator', 'admin' => 'Admin'], $DU->hak_akses, ['class' => 'form-control']) ?>
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
