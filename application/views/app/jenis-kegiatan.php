	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						JENIS KEGIATAN
						<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
						<a href="<?= base_url('jenis-kegiatan/create') ?>" class="btn btn-primary">Tambah</a>
					<?php endif ?>
				        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				    </div>
					<div class="panel-body">
                        <h4>Total Data : <strong><?= $totalJK ?></strong> </h4>
                        <table class="table table-striped text-center">
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenis Kegiatan</th>
														<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
													<?php endif ?>
                          </tr>
													<?php
			                			$i = 1;
			                			foreach($daftarJK as $item):
			              			?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $item->nama_jk ?></td>
														<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <td>
															<a href='<?= base_url('jenis-kegiatan/edit/'.$item->kode_jk) ?>' class="btn btn-info">EDIT</a>
                              <form action="<?= base_url('jenis-kegiatan/delete') ?>" method="post" style="display: inline-block">
                                    <input type="hidden" name="kode_jk" value="<?= $item->kode_jk ?>">
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
