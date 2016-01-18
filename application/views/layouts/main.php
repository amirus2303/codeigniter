<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<div class="col-xs-3">
			

			<?php $this->load->view("users/login_view"); ?>
		</div>

		<div class="col-xs-9">
			<?php $this->load->view($main_view); ?>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>
</html>