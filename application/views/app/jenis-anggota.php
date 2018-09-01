	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						JENIS ANGGOTA
						<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
						<a href="<?= base_url('jenis-anggota/create') ?>" class="btn btn-primary">Tambah</a>
					<?php endif ?>
				        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				    </div>
					<div class="panel-body">
                        <h4>Total Data : <strong><?= $totalJA ?></strong> </h4>
                        <table class="table table-striped text-center">
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenis Anggota</th>
														<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
													<?php endif ?>
                          </tr>

											<?php
	                			$i = 1;
	                			foreach($daftarJA as $item):
	              			?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $item->nama_ja ?></td>
														<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <td>
															<a href='<?= base_url('jenis-anggota/edit/'.$item->kode_ja) ?>' class="btn btn-info">EDIT</a>
                              <form action="<?= base_url('jenis-anggota/delete') ?>" method="post" style="display: inline-block">
                                    <input type="hidden" name="kode_ja" value="<?= $item->kode_ja ?>">
                                    <button type="submit" class="btn btn-danger">
                                        HAPUS
                                    </button>
                              </form>
                            </td>
													<?php endif ?>
                        </tr>
												<?php
												$i++;
											endforeach
												 ?>
                    </table>

										<nav style="width:100%;text-align:center">
            <ul class="pagination text-center" style="margin:0 auto">
								<?= $pagination ?>
            </ul>
            </nav>

					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
