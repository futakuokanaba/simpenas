
	<div class="container main">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Input Data User
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

            <?= form_open('data-user/post', ['class' => 'form-horizontal']) ?>
  <?= validation_errors() ?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username</label>
									<div class="col-md-9">
                                        <input type="text" name="username" value="<?= $input->username ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password</label>
									<div class="col-md-9">
                                        <input type="password" name="password" value="<?= $input->password ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Hak Akses</label>
									<div class="col-md-9">
                                        <?= form_dropdown('hak_akses', ['operator' => 'Operator', 'admin' => 'Admin'], $input->hak_akses, ['class' => 'form-control']) ?>
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
