<h1>Hello, this is a view</h1>

<?php if($this->session->flashdata('login_success')) : ?>
	<div class="alert alert-success"><?php echo $this->session->flashdata('login_success'); ?></div>
<?php endif; ?>
<?php echo $this->session->userdata('user_name') ?>


<?php if($this->session->flashdata('login_failed')) : ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></div>
<?php endif; ?>