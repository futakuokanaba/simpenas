
	<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>

	<?php if($this->session->has_userdata('msg')): ?>
		<div class="modal fade" id="msgModal">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>SIMPENAS</h2>
				</div>
				<div class="modal-body">
					<h3><?= $this->session->userdata('msg') ?>!</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</div>

		<script type="text/javascript">
			$('#msgModal').modal('show');
		</script>
	<?php endif ?>

</body>
</html>
