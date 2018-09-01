
	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Pelunasan Pembayaran
						<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
						<a href="<?= base_url('pelunasan/create') ?>" class="btn btn-primary">Tambah</a>
					<?php endif ?>
				        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				    </div>
					<div class="panel-body">
                        <h4>Total Data : <strong><?= $totalPelunasan ?></strong> </h4>
                        <table class="table table-striped text-center">
                        <caption class="text-center"> <strong>DAFTAR PELUNASAN PEMBAYARAN</strong></caption>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Anggota</th>
                            <th class="text-center">Waktu Pembayaran</th>
                            <th class="text-center">Jumlah Pelunasan</th>
                            <th class="text-center">Action</th>
                          </tr>
													<?php
			                			$i = 1;
			                			foreach($daftarPelunasan as $item):
			              			?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $item->nama_da ?></td>
                            <td><?= $item->waktu_pembayaran ?></td>
                            <td>Rp. <?= number_format($item->jumlah_pelunasan, 0, ',', '.') ?></td>
                            <td>
															<a href='<?= base_url('pelunasan/detail/'.$item->kode_pelunasan) ?>' class="btn btn-primary">DETAIL</a>
															<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                              <a href='<?= base_url('pelunasan/edit/'.$item->kode_pelunasan) ?>' class="btn btn-info">EDIT</a>
															<form action="<?= base_url('pelunasan/delete') ?>" method="post" style="display: inline-block">
                                    <input type="hidden" name="kode_pelunasan" value="<?= $item->kode_pelunasan ?>">
                                    <button type="submit" class="btn btn-danger">
                                        HAPUS
                                    </button>
                              </form>
														<?php endif ?>
                            </td>
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
