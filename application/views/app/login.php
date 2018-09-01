<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMPENAS - Login</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<style>
        body{
            background: #36D1DC;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5B86E5, #36D1DC);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5B86E5, #36D1DC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        #headerApps{
            margin-top: -25px;
            margin-bottom: 50px;
            border-bottom: 0;
        }
        #headerApps img{
            margin-top: 0px;
            width: 125px;
        }
    </style>
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

	<div class="row">

		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default" style="border-radius: 25px">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php if(!empty($this->session->flashdata('error_msg'))): ?>
        		<p class="btn btn-outline-danger text-center" style="border: red 1px solid; color:red; width:100%; text-align:center; margin-bottom:15px;"><?= $this->session->flashdata('error_msg') ?></p>
      		<?php endif ?>
					<?= form_open('login/index', ['role' => 'form']) ?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" value="<?= $input->username ?>">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="<?= $input->password ?>">
							</div>
							<button type="submit" class="btn btn-primary">Log In</button>
							</fieldset>
					<?= form_close() ?>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
