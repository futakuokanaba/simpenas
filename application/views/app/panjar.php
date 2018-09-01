	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Panjar
						<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
						<a href="<?= base_url('panjar/create') ?>" class="btn btn-primary">Tambah</a>
					<?php endif ?>
				        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				    </div>
					<div class="panel-body">
                        <h4>Total Data : <strong><?= $totalPanjar ?></strong> </h4>
                        <table class="table table-striped text-center">
                        <caption class="text-center"> <strong>DAFTAR ANGGOTA PENERIMA PANJAR</strong></caption>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Anggota</th>
                            <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Jumlah Panjar</th>
                            <th class="text-center">Action</th>
                          </tr>
													<?php
			                			$i = 1;
			                			foreach($daftarPanjar as $item):
			              			?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $item->nama_da ?></td>
                            <td><?= $item->nama_jk ?></td>
                            <td>Rp. <?= number_format($item->jumlah_panjar, 0, ',', '.') ?></td>
                            <td>
															<a href='<?= base_url('panjar/detail/'.$item->kode_panjar) ?>' class="btn btn-primary">DETAIL</a>
															<?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                              <a href='<?= base_url('panjar/edit/'.$item->kode_panjar) ?>' class="btn btn-info">EDIT</a>
															<form action="<?= base_url('panjar/delete') ?>" method="post" style="display: inline-block">
                                    <input type="hidden" name="kode_panjar" value="<?= $item->kode_panjar ?>">
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
