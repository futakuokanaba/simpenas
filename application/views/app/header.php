<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMPENAS - SEKRETARIAT DPRD KOTA GORONTALO</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<div class="jumbotron text-center" id="headerApps">
        <div>
            <img src="<?= base_url('assets/images/logokota.png') ?>">
        </div>
        <div>
	        <h1> <strong>SIMPENAS</strong> </h1>
	        <h4>Sistem Informasi Monitoring Perjalanan Dinas</h4>
	        <h4>sekretariat dprd kota gorontalo</h4>
	    </div>
	</div>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav nav-tabs nav-justified">
							<?php if(!$this->uri->segment(1)): ?>
								<li class="active"><a href="<?= base_url('') ?>"> <span class="fa fa-dashboard fa-lg"></span> BERANDA</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('') ?>"> <span class="fa fa-dashboard fa-lg"></span> BERANDA</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'master' || $this->uri->segment(1) === 'jenis-anggota' || $this->uri->segment(1) === 'jenis-perjalanan' || $this->uri->segment(1) === 'data-user' || $this->uri->segment(1) === 'jenis-kegiatan' || $this->uri->segment(1) === 'data-anggota'): ?>
              	<li class="active"><a href="<?= base_url('master') ?>"> <span class="fa fa-database fa-lg"></span> MASTER</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('master') ?>"> <span class="fa fa-database fa-lg"></span> MASTER</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'transaksi' || $this->uri->segment(1) === 'kegiatan' || $this->uri->segment(1) === 'panjar' || $this->uri->segment(1) === 'pelunasan'): ?>
								<li class="active"><a href="<?= base_url('transaksi') ?>"> <span class="fa fa-gears fa-lg"></span> TRANSAKSI</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('transaksi') ?>"> <span class="fa fa-gears fa-lg"></span> TRANSAKSI</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'laporan'): ?>
              	<li class="active"> <a href="<?= base_url('laporan') ?>"> <span class="fa fa-file-pdf-o fa-lg"></span> LAPORAN</a> </li>
							<?php else: ?>
								<li> <a href="<?= base_url('laporan') ?>"> <span class="fa fa-file-pdf-o fa-lg"></span> LAPORAN</a> </li>
							<?php endif ?>
              <li> <a href="<?= base_url('logout') ?>"> <span class="fa fa-sign-out fa-lg"></span> KELUAR</a> </li>
            </ul>
        </div>
      </div>
    </nav>

<?php if(!$this->uri->segment(1) === FALSE): ?>
	<?php if($this->uri->segment(1) === 'master' || $this->uri->segment(1) === 'jenis-anggota' || $this->uri->segment(1) === 'jenis-perjalanan' || $this->uri->segment(1) === 'data-user' || $this->uri->segment(1) === 'jenis-kegiatan' || $this->uri->segment(1) === 'data-anggota'): ?>
      <div class="container">
            <ul class="nav nav-pills nav-justified" id="subNavHeader">
							<?php if($this->uri->segment(1) === 'jenis-anggota'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('jenis-anggota') ?>"> <span class="fa fa-user fa-lg"></span> JENIS ANGGOTA</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('jenis-anggota') ?>"> <span class="fa fa-user fa-lg"></span> JENIS ANGGOTA</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'jenis-perjalanan'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('jenis-perjalanan') ?>"><span class="fa fa-map-o fa-lg"></span> JENIS PERJALANAN</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('jenis-perjalanan') ?>"><span class="fa fa-map-o fa-lg"></span> JENIS PERJALANAN</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'jenis-kegiatan'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('jenis-kegiatan') ?>"><span class="fa fa-podcast fa-lg"></span> JENIS KEGIATAN</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('jenis-kegiatan') ?>"><span class="fa fa-podcast fa-lg"></span> JENIS KEGIATAN</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'data-anggota'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('data-anggota') ?>"> <span class="fa fa-user-circle fa-lg"></span> DATA ANGGOTA</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('data-anggota') ?>"> <span class="fa fa-user-circle fa-lg"></span> DATA ANGGOTA</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'data-user'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('data-user') ?>"> <span class="fa fa-users fa-lg"></span> DATA USER</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('data-user') ?>"> <span class="fa fa-users fa-lg"></span> DATA USER</a></li>
							<?php endif ?>
            </ul>
      </div>
	<?php endif ?>
	<?php if($this->uri->segment(1) === 'kegiatan' || $this->uri->segment(1) === 'panjar' || $this->uri->segment(1) === 'pelunasan' || $this->uri->segment(1) === 'transaksi'): ?>
			<div class="container">
            <ul class="nav nav-pills nav-justified" id="subNavHeader">
							<?php if($this->uri->segment(1) === 'kegiatan'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('kegiatan') ?>"> <span class="fa fa-podcast fa-lg"></span> KEGIATAN</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('kegiatan') ?>"> <span class="fa fa-podcast fa-lg"></span> KEGIATAN</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'panjar'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('panjar') ?>"><span class="fa fa-money fa-lg"></span> PANJAR</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('panjar') ?>"><span class="fa fa-money fa-lg"></span> PANJAR</a></li>
							<?php endif ?>
							<?php if($this->uri->segment(1) === 'pelunasan'): ?>
								<li role="presentation" class="active"><a href="<?= base_url('pelunasan') ?>"><span class="fa fa-check fa-lg"></span> PELUNASAN</a></li>
							<?php else: ?>
								<li role="presentation"><a href="<?= base_url('pelunasan') ?>"><span class="fa fa-check fa-lg"></span> PELUNASAN</a></li>
							<?php endif ?>
            </ul>
      </div>
	<?php endif ?>
<?php else: ?>

<?php endif ?>
